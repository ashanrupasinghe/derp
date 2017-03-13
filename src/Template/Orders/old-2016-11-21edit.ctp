<div class="orders form large-10 medium-10 columns content">
    <?= $this->Form->create($order) ?>
    <fieldset>
        <legend><?= __('Edit Order') ?></legend>
        <?php
            echo $this->Form->input('customerId');
            echo $this->Form->input('address');
            //echo $this->Form->input('city');
             echo $this->Form->input('city',['options'=>$cities,'empty'=>'select city']);
            echo $this->Form->input('latitude');
            echo $this->Form->input('longitude');
           // echo $this->Form->input('callcenterId');
            //echo $this->Form->input('deliveryId');
            echo $this->Form->input('callcenterId',['empty'=>'select callcenter','options'=>$callcenters,'disabled' => true,'name'=>'callcenterIdDisables','id'=>'callcenterIdDisables']);
			echo $this->Form->input('callcenterId',['empty'=>'select callcenter','options'=>$callcenters,'disabled' => false,'type'=>'hidden']);
			echo $this->Form->input('deliveryId',['empty'=>'select deliver','options'=>$deliveries]);
            echo $this->Form->input('subTotal');
            echo $this->Form->input('tax');
            echo $this->Form->input('discount');
            echo $this->Form->input('couponCode');
            echo $this->Form->input('total');
            echo $this->Form->input('paymentStatus');
            //echo $this->Form->input('status');
            $status=['1'=>'Active','0'=>'Inactive'];
            echo $this->Form->input('status',['options'=>$status,'empty'=>'select status']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
