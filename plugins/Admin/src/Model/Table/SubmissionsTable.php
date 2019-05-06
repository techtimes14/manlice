<?php
namespace Admin\Model\Table;

use Cake\Event\Event;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class SubmissionsTable extends Table{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table(DB_PREFIX.'submissions');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
		$this->belongsTo('Users',[
							'className'=>'Admin.Users',
							'foreignKey'=>'user_id'							
						]);
		$this->belongsTo('Prices',[
							'className'=>'Admin.Prices',
							'foreignKey'=>'price_id'							
						]);
		$this->belongsTo('Plans',[
							'className'=>'Admin.Plans',
							'foreignKey'=>'plan_id'							
						]);
		$this->belongsTo('Properties',[
							'className'=>'Admin.Properties',
							'foreignKey'=>'property_id'							
						]);
		$this->belongsTo('MortgageStatuses',[
							'className'=>'Admin.MortgageStatuses',
							'foreignKey'=>'mortgage_id'							
						]);
    }

    public function beforeFind(Event $event, Query $query){
    }
	
}