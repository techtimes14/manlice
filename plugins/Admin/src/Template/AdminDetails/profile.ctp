<?php use Cake\Routing\Router; ?>
<article class="content forms-page">
    <div class="title-block">
        <h3 class="title">
    		Profile
    	</h3>
        <p class="title-description"> All fields are required </p>
    </div>
    <section class="section">
        <div class="row sameheight-container">
            <div class="col-md-6">
                <div class="card card-block sameheight-item">
                    <div class="title-block">
                        <h3 class="title">
                            Account Details
                        </h3>
                    </div>
                    <?php echo $this->Flash->render(); ?>
                    <?php echo $this->Form->create($profile,['role' => 'form', 'novalidate' => 'novalidate', 'id' => 'login-form']); ?>

                        <div class="form-group <?php if($this->Form->isFieldError('first_name')): echo 'has-error'; else: echo 'has-success'; endif; ?>">
                            <?php echo $this->Form->input('first_name', ['required' => true, 'class' => 'form-control underlined', 'label' => ['text' => 'First Name','class' => 'control-label'], 'error' => false]);
                                echo $this->Form->error('first_name', null); ?>
                        </div>

                        <div class="form-group <?php if($this->Form->isFieldError('last_name')): echo 'has-error'; else: echo 'has-success'; endif; ?>">
                            <?php echo $this->Form->input('last_name', ['required' => true, 'class' => 'form-control underlined', 'label' => ['text' => 'Last Name','class' => 'control-label'], 'error' => false]);
                                echo $this->Form->error('last_name', null); ?>
                        </div>

                        <div class="form-group <?php if($this->Form->isFieldError('email')): echo 'has-error'; else: echo 'has-success'; endif; ?>">
                            <?php echo $this->Form->input('contact_email', ['type'=>'email', 'required' => true, 'class' => 'form-control underlined', 'label' => ['text' => 'Email (Contact Email)','class' => 'control-label'], 'error' => false]);
                                echo $this->Form->error('email', null); ?>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <?php echo $this->Form->button('Update',['class' => 'btn btn-success', 'type' => 'submit' ]); ?>
                            </div>
                        </div>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card sameheight-item">
                    <div class="card-block">
                        <!-- Nav tabs -->
                        <div class="card-title-block">
                            <h3 class="title">
                                Note
                            </h3>
                        </div>
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item"> <a href="#home" class="nav-link active" data-target="#home" data-toggle="tab" aria-controls="home" role="tab">Profile</a> </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content tabs-bordered">
                            <div class="tab-pane fade in active" id="home">
                                <h4>Account Details</h4>
                                <p>This details are common and are only taken for showing in your account. The email id change will not affect your login details.</p>
                                <p>
                                    To change the login email id open: 
                                    <?php echo $this->Html->link(
                                                'Change Login Email',
                                                ['controller' => 'AdminDetails', 'action' => 'loginEmail', '_full' => true]
                                            ); ?>
                                </p>
                                <p>
                                    To change the password open: 
                                    <?php echo $this->Html->link(
                                                'Change Login Password',
                                                ['controller' => 'AdminDetails', 'action' => 'changePassword', '_full' => true]
                                            ); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-block -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
</article>