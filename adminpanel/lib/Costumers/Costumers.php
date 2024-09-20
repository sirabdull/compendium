<?php
class Costumers
{
    /**
     *
     */
    public function __construct()
    {
    }

    /**
     *
     */
    public function __destruct()
    {
    }
    
    /**
     * Set friendly columns\' names to order tables\' entries
     */
    public function setOrderingValues()
    {
        $ordering = [
            'id' => 'ID',
            'fullname' => 'FullName',
            'email' => 'Email',
            'mobile' => 'Mobile',
            'subscribed' => 'subscribed',
            'subscription_type' => 'subscription_type',
            'reg-date' => 'Registerd_date'
        ];

        return $ordering;
    }
}
?>
