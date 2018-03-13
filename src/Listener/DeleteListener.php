<?php
namespace App\Listener;

use Doctrine\ORM\Event\PreFlushEventArgs;

class DeleteListener
{

    public function preFlush(PreFlushEventArgs $args)
    {
        $em = $args->getEntityManager();
        
        foreach ($em->getUnitOfWork()->getScheduledEntityDeletions() as $object) {
            if (method_exists($object, "getDate_delete")) {
                if ($object->getDate_delete() instanceof \Datetime) {
                    var_dump("Delete physique" . $object->getDate_delete()->format("d-m-Y H:i:s"));
                    continue;
                } else {
                    var_dump("Delete virtuel");
                    $object->setDate_delete(new \DateTime());
                    $object->setDeleted(true);
                    $object->setUser_delete('1');
                    $em->merge($object);
                    $em->persist($object);
                }
            }
        }
    }
}