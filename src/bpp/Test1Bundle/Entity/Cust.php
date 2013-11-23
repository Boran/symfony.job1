<?php
namespace bpp\Test1Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="sales_ledger")
 */
class Cust
{
 /** @ORM\Id
   * @ORM\Column(name="account_ref")
   * @ORM\Column(length=30)
   */
   protected $id;   // account_ref
     /** @ORM\Column(length=255) */
    protected $name;
     /** @ORM\Column(length=255) */
    protected $address_1;
     /** @ORM\Column(length=255) */
    protected $address_2;

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
     * @return Cust
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
     * Set name
     *
     * @param string $name
     * @return Cust
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set address1
     *
     * @param string $address1
     * @return Cust
     */
    public function setAddress1($address1)
    {
        $this->address_1 = $address1;
    
        return $this;
    }

    /**
     * Get address1
     *
     * @return string 
     */
    public function getAddress1()
    {
        return $this->address_1;
    }

    /**
     * Set address2
     *
     * @param string $address2
     * @return Cust
     */
    public function setAddress2($address2)
    {
        $this->address_2 = $address2;
    
        return $this;
    }

    /**
     * Get address2
     *
     * @return string 
     */
    public function getAddress2()
    {
        return $this->address_2;
    }
}