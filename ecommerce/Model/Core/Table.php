<?php

namespace Model\Core;

class Table {
    protected $adapter = null;
    protected $primaryKey = null;
    protected $tableName = null;
    protected $admin = null;
    public $data = [];
    protected $arrayData = [];

    public function __construct() {
    }

    public function setAdapter() {
        $this->adapter = \Mage::getController('Model\Core\Adapter');
        return $this;
    }

    public function getAdapter() {
        if (!$this->adapter) {
            $this->setAdapter();
        }
        return $this->adapter;
    }

    public function setPrimaryKey($value) {
        $this->primaryKey = $value;
        return $this;
    }

    public function getPrimaryKey() {
        return $this->primaryKey;
    }

    public function setTableName($value) {
        $this->tableName = $value;
        return $this;
    }

    public function getTableName() {
        return $this->tableName;
    }

    public function __set($key, $value) {
        $this->data[$key] = $value;
        return $this;
    }

    public function __get($key) {
        if (!array_key_exists($key,$this->data)) {
            return null;
        }
        return $this->data[$key];
    }

    public function setArrayData(array $key, array $value) {
        $this->arrayData = $this->arrayData = array_combine($key, $value);
        return $this;
    }

    public function getArrayData(){
        return $this->arrayData;
    }

    public function arrayUpdate($id = null)
    {
        $data = $this->getArrayData();
        foreach ($data as $key => $value) {
            $values = implode(',', $value);
          
            $query = "UPDATE `{$this->getTableName()}` SET $key = '$values' WHERE `{$this->getPrimaryKey()}` = '$id'";
            //echo $query;
            $this->getAdapter()->update($query);
        }
        //die();
        return $this;
    }

    public function setData(array $data) {
    $this->data = array_merge($this->data,$data);
       return $this;
    }

    public function getData() {
        return $this->data;
    }

    public function save() {
        $adapter = \Mage::getController('Model\Core\Adapter');
        $data = $this->getData();
        $fields = "`".implode("`,`",array_keys($data))."`";
        $values = "'".implode("','",array_values($data))."'";
        $primaryKey = $this->getPrimaryKey();
        if (array_key_exists($primaryKey,$this->data)) {
            $value = $this->data[$this->getPrimaryKey()];
            $cols = [];
            foreach($this->data as $key=>$val) {
                $cols[] = "$key = '$val'";
            }
            $query = "update `{$this->getTableName()}` set ". implode(', ', $cols)."where `{$this->getPrimaryKey()}` = {$value} ";
            $id = $this->getAdapter()->update($query);
        }
        $query="insert into `{$this->getTableName()}` (".$fields.") values (".$values.")";
        $id = $this->getAdapter()->insert($query);
        $this->load($id);
        return $this;    
    }

    public function edit($query){
		$row = $this->getAdapter()->edit($query);
	}

    public function update($query) {
        return $this->getAdapter()->update($query);
    }

    public function deleteOption($query) {
        return $this->getAdapter()->delete($query);
    }

    public function load($value) {
        $value = (int)$value;
        $query = "select * from `{$this->getTableName()}` where `{$this->getPrimaryKey()}` = {$value}";
        $row = $this->getAdapter()->edit($query);
        if (!$row) {
            return false;
        }
        $this->data = $row;
        return $this;
    }

    public function fetchRow($query){
		$row = $this->getAdapter()->edit($query);	
		if(!$row){
			return false;
		}
		$this->data = $row;
		return $this;	
	}

    public function delete($id = null) {
        if ($id == null) {
            if (!array_key_exists($this->getPrimarykey(), $this->data)) {
                return false;
            }
            $data = $this->getData();
            $id = $data[$this->getPrimaryKey()];
        }
        $query = "delete from `{$this->getTableName()}` where `{$this->getPrimaryKey()}` = {$id}";
        return $this->getAdapter()->delete($query);
    }

    public function fetchAll($query = null)
	{
        if (!$query) {
            if ($this->getTableName() == 'customer') {
                $query = "select c.customerId, cg.name as `customerGroup`,ca.zipCode, c.firstName, c.lastName, c.email, c.mobile, c.password, c.status, c.createdDate, c.updatedDate from customer as c inner join customer_group as cg on c.customerGroup = cg.groupId inner join customer_address as ca on c.customerId = ca.customerId where ca.addressType = 1";
            } else {
                $query = "select * from `{$this->getTableName()}`";
            }
        }
		$rows = $this->getAdapter()->fetchAll($query);
		if(!$rows){
			return false;
		}
		foreach ($rows as $key => &$value) {
			$row = new $this;
			$value = $row->setData($value);
		}
		$collectionClassName = get_class($this).'\Collection';
		$collection = \Mage::getModel($collectionClassName);
		$collection->setData($rows);
		return $collection;
		
	}

    public function newRow($query)
    {
        return $this->getAdapter()->newRow($query);
    }
}

?>