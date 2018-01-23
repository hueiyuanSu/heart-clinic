
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<!-- Register Modal -->
    <div class="modal fade" id="ws-register-modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <a class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a>
                </div>

                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <?php $form = ActiveForm::begin([
                            'id' => 'registration-form',
                            'options' => [
                                'class' => 'ws-register-form'
                            ],
                            'enableAjaxValidation' => true,
                            'enableClientValidation' => false,
                        ]) ?>
                        <div class="modal-body">
                            <!-- Register Form -->


                                <h3><?= Yii::t('appWeb', 'Create An Account');?></h3>
                                <div class="ws-separator"></div>
                                <!-- Name -->
                                <?= $form->field($model, 'username')->label(Yii::t('appuser', 'Username')); ?>

                                <?php ActiveForm::end(); ?>
                                <div class="form-group">
                                    <label class="control-label">Name <span>*</span></label>
                                    <input type="text" class="form-control">
                                </div>

                                <!-- Email -->
                                <?= $form->field($model, 'email')->label(Yii::t('appuser', 'Email')); ?>
                                <div class="form-group">
                                    <label class="control-label">Email Adress <span>*</span></label>
                                    <input type="email" class="form-control">
                                </div>

                                <!-- Password -->
                                <?php if ($module->enableGeneratingPassword == false): ?>
                                    <?= $form->field($model, 'password')->passwordInput()->label(Yii::t('appuser', 'Password')); ?>
                                <?php endif ?>
                                <div class="form-group">
                                    <label class="control-label">Password <span>*</span></label>
                                    <input type="password" class="form-control">
                                </div>

                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox">I accept the <a href="faq.html">Terms of Service</a>
                                        </label>
                                    </div>
                                </div>



                            </form>
                        </div>

                        <div class="modal-footer">
                            <!-- Button -->
                            <?= Html::submitButton(Yii::t('appuser', 'Create Account'), ['class' => 'btn ws-btn-fullwidth']) ?>
                            <a class="btn ws-btn-fullwidth">Create Account</a>
                            <br><br>
                            <!-- Facebook Button -->
                            <!-- <a class="btn ws-btn-facebook">Sign in with Facebook</a> -->
                            <!-- Link -->
                            <div class="ws-register-link">
                                <a href="#ws-register-modal" data-toggle="modal"><?= Yii::t('appuser','Already have an account? Sign in here.');?></a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Register Modal -->
