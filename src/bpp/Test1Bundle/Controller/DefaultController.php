<?php
namespace bpp\Test1Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use bpp\Test1Bundle\Entity\Job;
use bpp\Test1Bundle\Form\Type\JobType;

class DefaultController extends Controller
{
    public $debug_flag1=TRUE;
    public $debug_to_syslog=FALSE;
    public function debug1($msg)
    {
        $msg=rtrim($msg);
        if (($this->debug_flag1==TRUE) && (strlen($msg)>0) ) {
            $logger=$this->get('logger');
            $logger->info('Debug1 ' . $msg);
        }
//        $this->get('session')->getFlashBag()->add(
//            'notice', 'flash=' . $msg
//        );
    }

    /**
     * @Route("/new")
     * @Template()
     *     will look for index.html.twig automatically
     */
    public function newAction(Request $request)    // TODO: actually save it?
    {
        $this->debug1("newAction ");
	   	$job = new Job();
        $job->setId('999');   // set defaults, should be in the constructor?
        $job->setCustCode('TEST01');

        //$form = $this->createForm(new JobType(), $job);   // broken
        $form = $this->createFormBuilder($job)
        ->add('id', 'integer',  array('label'=>'Job Number', ))
        ->add('JSpecNo', 'text')
        ->add('JobStatus', 'text')
        ->add('CustCode', 'text')
        ->add('lastchange', 'date', array('label'=>'Last Change', ))
        //->add('lastchange', 'date', array('widget'=>'single_text'))
        //->add('jobcard2:InvByDate', 'date')
        ->add('Create', 'submit')
        ->getForm();
        $this->debug1('new job form built');

        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            //$em->getConfiguration()->setSQLLogger(new \Doctrine\DBAL\Logging\EchoSQLLogger());
            //$em->getConfiguration()->setSQLLogger(new DbalLogger($app['logger'], isset($app['stopwatch']) ? $app['stopwatch'] : null));
            $em->persist($job);  // save to the DB
            $em->flush();
            return $this->render('bppTest1Bundle:Default:new.html.twig',
                array('form' => $form->createView(),
                    'name'=>'',
                    'job' => $job
                )
            );
        }
        return $this->render('bppTest1Bundle:Default:new.html.twig',
            array('form' => $form->createView(), 'name'=>'', )
        );

			// if $form->get('Custcode')->getData()=='TEST01' then ....
			//return new Response('<html><body>BPP HEW JOB '.$name.'!</body></html>');
			// display form only, not saved:
      //return $this->render('bppTest1Bundle:Default:new.html.twig', array(
      //      'form' => $form->createView(),));
//        if ($request->getMethod() == 'POST') {
//            $form->bind($request);
//            if ($form->isValid()) {
//                $em = $this->getDoctrine()->getManager();
//                $em->persist($job);  // save to the DB
//                $em->flush();
//                // TODO: perform some action, such as saving the task to the database
//                return $this->redirect($this->generateUrl('job_success'));
//                //return new Response('Id du produit créé : '.$product->getId());
//            }
//        }
//        else {
//            return $this->render('bppTest1Bundle:Default:new.html.twig', array(
//                'form' => $form->createView(),));
//        }

        //return $this->render('bppTest1Bundle:Default:new.html.twig');
    }

    /**
     * @Route("/jobstatus/{id}")
     */
    public function jobstatusAction($id)   // TODO
    {
      $job = $this->getDoctrine() ->getRepository('bppTest1Bundle:Job') ->find($id);
      if (!$job) {
        throw $this->createNotFoundException('No job found for number '.$id);
      }
			// TODO: update the status for that job
    }

    /**
     * @Route("/view/{name}")
     */
    public function viewAction($name)
    {
        $id=$name;
        $job = $this->getDoctrine() ->getRepository('bppTest1Bundle:Job') ->find($id);
        if (!$job) {
            throw $this->createNotFoundException('No job found for number '.$id);
        }
        return $this->render('bppTest1Bundle:Default:job.html.twig', array('job' => $job));
//        return new Response('<html><body><h1>Job details </h1>for job ' .$name
//        .', customer=' .$job->getCustCode() .', status=' .$job->getJobStatus()
//        .', spec=' .$job->getJspecNo() .'</body></html>');
    }

    /**
     * @Route("/barcode/{name}")
     * @Template()
     *     will look for index.html.twig automatically
     */
    public function barAction($name)
    {
			$logger=$this->get('logger');
            $logger->info('barcode: ' . $name);
			return new Response('<html><body>Barcode: ' .$name .'</body></html>');
    }

    /**
     * @Route("/get/{name}")
     */
    public function indexAction($name)
    {
			$job = $this->getDoctrine() ->getRepository('bppTest1Bundle:Job') ->find(1);
			if (!$job) {
				throw $this->createNotFoundException('No job found for id '.$id);
			}
			//return new Response('<html><body>BPP Hello '.$name .$job->getCnUp() .'!</body></html>');
			//return new Response('<html><body>BPP Hello '.$name .$job->cn_up .'!</body></html>');
			return new Response("<html><body>BPP indexAction For Job $name, customer=" . $job->getCustCode() . "</body></html>");
			//return new Response('<html><body>BPP Hello '.$name.'!</body></html>');
            //return $this->render('bppTest1Bundle:Default:index.html.twig', array('name' => 'BP ' .$name));
			//return $this->render('bppTest1Bundle:Hello:index.html.twig', array('name' => $name));
    }

    /**
     * @Route("/test/{name}")
     */
    public function testAction($name)   // hacking
    {
        $session = $this->getRequest()->getSession();
        $session->set('foo', 'bar');
        $foo = $session->get('foo');
        $this->get('session')->getFlashBag()->add('notice', 'Test message!');
        return new Response('BPP testAction Hello');
    }
}

