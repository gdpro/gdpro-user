<?php
namespace GdproUser\Entity;

interface UserInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();

    /**
     * Set uuid
     *
     * @param string $uuid
     * @return UserAccount
     */
    public function setUuid($uuid);

    /**
     * Get uuid
     *
     * @return string
     */
    public function getUuid();

    /**
     * Set email
     *
     * @param string $email
     * @return UserAccount
     */
    public function setEmail($email);

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail();

    /**
     * Set password
     *
     * @param string $password
     * @return UserAccount
     */
    public function setPassword($password);

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword();

    /**
     * Set username
     *
     * @param string $username
     * @return UserAccount
     */
    public function setUsername($username);

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername();

    /**
     * Set activationKey
     *
     * @param string $activationKey
     * @return UserAccount
     */
    public function setActivationKey($activationKey);

    /**
     * Get activationKey
     *
     * @return string
     */
    public function getActivationKey();

    /**
     * Set activated
     *
     * @param boolean $activated
     * @return UserAccount
     */
    public function setActivated($activated);

    /**
     * Get activated
     *
     * @return boolean
     */
    public function getActivated();

    /**
     * Set activationDate
     *
     * @param \DateTime $activationDate
     * @return UserAccount
     */
    public function setActivationDate($activationDate);

    /**
     * Get activationDate
     *
     * @return \DateTime
     */
    public function getActivationDate();

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     * @return UserAccount
     */
    public function setCreationDate($creationDate);

    /**
     * Get creationDate
     *
     * @return \DateTime
     */
    public function getCreationDate();

    /**
     * Set modificationDate
     *
     * @param \DateTime $modificationDate
     * @return UserAccount
     */
    public function setModificationDate($modificationDate);

    /**
     * Get modificationDate
     *
     * @return \DateTime
     */
    public function getModificationDate();

    /**
     * Set deletionDate
     *
     * @param \DateTime $deletionDate
     * @return UserAccount
     */
    public function setDeletionDate($deletionDate);

    /**
     * Get deletionDate
     *
     * @return \DateTime
     */
    public function getDeletionDate();

    /**
     * Set deleted
     *
     * @param boolean $deleted
     * @return UserAccount
     */
    public function setDeleted($deleted);

    /**
     * Get deleted
     *
     * @return boolean
     */
    public function getDeleted();
}
