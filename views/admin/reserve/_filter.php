<div class="an-single-component with-shadow">                                                                                                                                         <div class="an-component-header">
        <h6><?=Yii::t('app', 'Filter');?></h6>
    </div>
    <div class="an-component-body">
        <div class="an-helper-block">
            <form id="search-form" class="form-inline">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="an-input-group addon_w130">
                            <div class="an-input-group-addon mobile_hide">
                                <span class="addon_label"><?= Yii::t('app', 'Patient Name');?></span>
                            </div>
                            <input class="an-form-control mobile_reset" name="ClientSearch[key]" placeholder="<?= Yii::t('app', 'Key-Word');?>" type="text" id="filter-client-key-word">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="an-input-group addon_w130">
                          <div class="an-input-group-addon mobile_hide">
                              <span class="addon_label"><?= Yii::t('app', 'Reserve Date');?></span>
                          </div>
                          <input class="an-form-control range_input mobile_reset" name="ClientSearch[reserve_date]" placeholder="<?= Yii::t('app', 'Reserve Date');?>" type="text" id="datetimepicker-start">
                    </div>
                    </div>
                    <div class="col-xs-12 col-sm-2 col-md-4">
                        <div class="btn btn-info pull-right" id="search-form-submit"><i class="fa fa-search m-r-5"></i><?= Yii::t('app', 'Search');?></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
