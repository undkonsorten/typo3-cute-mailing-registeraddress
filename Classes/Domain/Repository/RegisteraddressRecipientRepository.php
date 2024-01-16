<?php
namespace Undkonsorten\CuteMailingRegisteraddress\Domain\Repository;

use AFM\Registeraddress\Domain\Repository\AddressRepository;


class RegisteraddressRecipientRepository extends AddressRepository
{
    public function findAll(int $limit = null, int $offset = null)
    {
        $query = $this->createQuery();
        if(!is_null($limit) && $limit > 0){
            $query->setLimit($limit);
        }
        if(!is_null($offset) && $offset >0){
            $query->setOffset($offset);
        }
        return $query->execute();
    }

}
