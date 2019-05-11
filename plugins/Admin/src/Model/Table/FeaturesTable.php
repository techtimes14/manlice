<?php
namespace Admin\Model\Table;

use Cake\Event\Event;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class FeaturesTable extends Table{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table(DB_PREFIX.'features');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
    }

    public function beforeFind(Event $event, Query $query)
    {

    }
	
	public function validationDefault(Validator $validator){
        $validator
            ->requirePresence('title', true)
            ->notEmpty('title');
		
        $validator
            ->requirePresence('image', true)
            ->notEmpty('image');
			
		$validator
            ->requirePresence('status', true)
            ->notEmpty('status');

        return $validator;
    }
	
}