<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?= __('User Notifications: '.$userId) ?><small><?= __('all notifications for user id: '.$userId) ?></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
  			  		<table class="table table-hover">
                      <thead>
                        <tr>
                          <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('orderId') ?></th>
                
                <th><?= $this->Paginator->sort('notification') ?></th>
                <th><?= $this->Paginator->sort('type') ?></th>
                <th><?= $this->Paginator->sort('seen') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>   
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($userNotifications as $userNotification): ?>
            <tr class="notify-seen" id="<?= $userNotification->id ?>">
                <td><?= $this->Number->format($userNotification->id) ?></td>
                <td><?= $this->Number->format($userNotification->orderId) ?></td>
                
                <td><a href="<?= $this->url->build('/user-notifications/genarateUrl/'.$userNotification->id.'/'.$userLevel.'/'.$userId);?>"><?= h($userNotification->notification) ?></a></td>
                <?php $typrArray=[1=>'new order', 2=>'product available', 3=>'product not available', 4=>'product ready', 5=>'product handover to delivery staff', 6=>'product took over by delivery staff', 7=>'order took over', 8=>'order delivered', 9=>'order cancelled', 10=>'order completed'];?>
                <td><?= $typrArray[$userNotification->type] ?></td>
                <?php $seenArray=[0=>'Not seen',1=>'Seen'];?>
                <td class="see-sow"><?= $seenArray[$userNotification->seen] ?></td>
                <td><?= $userNotification->created ?></td>
                
            </tr>
            <?php endforeach; ?>
                      </tbody>
                    </table>
                    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
                  </div>
                </div>
</div>