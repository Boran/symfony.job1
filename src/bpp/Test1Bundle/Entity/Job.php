<?php
namespace bpp\Test1Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/*
vi src/bpp/Test1Bundle/Entity/Job.php
*/

/**
 * @ORM\Entity
 * @ORM\Table(name="jobcard")
 */
class Job
{
	/**
	 * @ORM\Id
	 * @ORM\Column(name="jcard_no")
	 * @ORM\Column(type="integer")
	 */
	protected $id;
	/** @ORM\Column(length=8) */
    protected $cust_code;
	/** @ORM\Column(type="integer") */
    protected $job_status;
	/** @ORM\Column(type="integer") */
    protected $jspec_no;
	/** @ORM\Column(type="datetime") */
    protected $lastchange;

  /** Link Customer table
	* @ORM\OneToOne(targetEntity="Cust", cascade={"persist", "merge"})
	* @ORM\JoinColumn(name="cust_code", referencedColumnName="account_ref")
	*/
	protected $cust;   

    /**
     * @ORM\OneToOne(targetEntity="Jobcard2")
     * @ORM\JoinColumn(name="jcard_no", referencedColumnName="jcard_no")
     */
    protected $jobcard2;


    /**
     * Magic getter to expose protected properties.
     *
     * @param string $property
     * @return mixed
     */
    public function __get($property)
    {
        return $this->$property;
    }
    /**
     * Magic setter to save protected properties.
     *
     * @param string $property
     * @param mixed $value
     */
    public function __set($property, $value)
    {
        $this->$property = $value;
    }

    /**
     * Set id
     *
     * @param string $id
     * @return Job
     */
    public function setId($id)
    {
        $this->id = $id;
    
        return $this;
    }

    /**
     * Get id
     *
     * @return string 
     */
    public function getId()
    {
        return $this->id;
    }
    public function getJob()
    {
        return $this->id;
    }

    /**
     * Set cust_code
     *
     * @param string $custCode
     * @return Job
     */
    public function setCustCode($custCode)
    {
        $this->cust_code = $custCode;
        return $this;
    }

    /**
     * Get cust_code
     *
     * @return string 
     */
    public function getCustCode()
    {
        return $this->cust_code;
    }

    /**
     * Set cn_up
     *
     * @param bpp\Test1Bundle\Entity\Jobcard2 $cnUp
     * @return Job
     */
    public function setCnUp(\bpp\Test1Bundle\Entity\Jobcard2 $cnUp = null)
    {
        $this->cn_up = $cnUp;
    
        return $this;
    }

    /**
     * Get cn_up
     *
     * @return bpp\Test1Bundle\Entity\Jobcard2 
     */
    public function getCnUp()
    {
        return $this->cn_up;
    }

    /**
     * Set job_status
     *
     * @param integer $jobStatus
     * @return Job
     */
    public function setJobStatus($jobStatus)
    {
        $this->job_status = $jobStatus;
    
        return $this;
    }

    /**
     * Get job_status
     *
     * @return integer 
     */
    public function getJobStatus()
    {
        return $this->job_status;
    }

    /**
     * Set jspec_no
     *
     * @param integer $jspecNo
     * @return Job
     */
    public function setJspecNo($jspecNo)
    {
        $this->jspec_no = $jspecNo;
    
        return $this;
    }

    /**
     * Get jspec_no
     *
     * @return integer 
     */
    public function getJspecNo()
    {
        return $this->jspec_no;
    }

    /**
     * Set lastchange
     *
     * @param \DateTime $lastchange
     * @return Job
     */
    public function setLastchange($lastchange)
    {
        $this->lastchange = $lastchange;
    
        return $this;
    }

    /**
     * Get lastchange
     *
     * @return \DateTime 
     */
    public function getLastchange()
    {
        return $this->lastchange;
    }

    /**
     * Set cust_name
     *
     * @param bpp\Test1Bundle\Entity\Cust $custName
     * @return Job
     */
    public function setCustName(\bpp\Test1Bundle\Entity\Cust $custName = null)
    {
        $this->cust_name = $custName;
    
        return $this;
    }

    /**
     * Get cust_name
     *
     * @return bpp\Test1Bundle\Entity\Cust 
     */
    public function getCustName()
    {
        return $this->cust_name;
    }

    /**
     * Set cust
     *
     * @param bpp\Test1Bundle\Entity\Cust $cust
     * @return Job
     */
    public function setCust(\bpp\Test1Bundle\Entity\Cust $cust = null)
    {
        $this->cust = $cust;
        return $this;
    }

    /**
     * Get cust
     *
     * @return bpp\Test1Bundle\Entity\Cust 
     */
    public function getCust()
    {
        return $this->cust;
    }

    /**
     * Set jobcard2
     *
     * @param bpp\Test1Bundle\Entity\Jobcard2 $jobcard2
     * @return Job
     */
    public function setJobcard2(\bpp\Test1Bundle\Entity\Jobcard2 $jobcard2 = null)
    {
        $this->jobcard2 = $jobcard2;
        return $this;
    }

    /**
     * Get jobcard2
     *
     * @return bpp\Test1Bundle\Entity\Jobcard2 
     */
    public function getJobcard2()
    {
        return $this->jobcard2;
    }
}