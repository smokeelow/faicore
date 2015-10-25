<div id="payment-way">
    <ul id="methods">
    <?php foreach($this->getPaymentMethods() as $method):?>
        <li id="<?php echo $method;?>-method" class="payment-method">
            <a href="<?php echo $this->createUrl('cp/ajax',array('id'=>md5($method.$this->salt)));?>" onclick="getAjax(<?php echo $this->createUrl('cp/ajax',array('id'=>md5($method.$this->salt)));?>,'#payment-way');return false;">
                <img width="150" height="40" src="<?php $this->getPaymentMethodImage($method);?>" alt="<?php echo $method;?>"/>
            </a>
        </li>
    <?php endforeach;?>
    </ul>
</div>