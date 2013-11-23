<?php
namespace bpp\Test1Bundle\Entity;
//php app/console doctrine:generate:entities bpp/Test1Bundle/Entity/Jobcard2

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="jobcard2")
 */
class Jobcard2
{
  /**
   * @ORM\Id
   * @ORM\Column(name="jcard_no")
   * @ORM\Column(type="integer")
   */
  protected $id;
  /**  @ORM\Column(type="integer") */
  protected $cn_up;
  /** @ORM\Column(type="date") */
  protected $Inv_by_date;


    /**
     * Set id
     *
     * @param string $id
     * @return Jobcard2
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

    /**
     * Set cn_up
     *
     * @param integer $cnUp
     * @return Jobcard2
     */
    public function setCnUp($cnUp)
    {
        $this->cn_up = $cnUp;
        return $this;
    }

    /**
     * Get cn_up
     *
     * @return integer 
     */
    public function getCnUp()
    {
        return $this->cn_up;
    }

    /**
     * Set Inv_by_date
     *
     * @param \DateTime $invByDate
     * @return Jobcard2
     */
    public function setInvByDate($invByDate)
    {
        $this->Inv_by_date = $invByDate;
        return $this;
    }

    /**
     * Get Inv_by_date
     *
     * @return \DateTime 
     */
    public function getInvByDate()
    {
        return $this->Inv_by_date;
    }
}