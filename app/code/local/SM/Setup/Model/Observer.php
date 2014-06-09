<?php
class SM_Setup_Model_Observer
{
    public function updateTransaction(Varien_Event_Observer $observer){
//        $order = $observer->getEvent()->getOrder();
//        $state = 'pending_payment';
//        $status = 'my_Pending_status';
//        $comment = 'Changing state to payment_review and status to My Pending Status';
//        $isCustomerNotified = false;
//        $order->setState($state,$status,$comment,$isCustomerNotified);
//        $order->save();
//        var_dump(get_class($order));
//        var_dump($order->getState());
//        var_dump($order->getData('status'));die('sss');
    }

    public function updateCommentOrder(Varien_Event_Observer $observer){
        $order = $observer->getEvent()->getOrder();
        $_comment = Mage::app()->getRequest()->getParam('ordercomment');
        if(is_array($_comment) && isset($_comment['comment'])){
            $_orderComment =  trim($_comment['comment']);
            if($_orderComment){
                $order->setCustomerComment($_orderComment);
            }
        }
    }
}