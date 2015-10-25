<?php
class Item
{
    public static function getItem($item)
    {
        if (substr($item,0,2) == '0x')
            $item	= substr($item,2);

        if ((strlen($item) != Yii::app()->getFConfig('versionBit')) || (!preg_match('(^[a-zA-Z0-9])', $item))
            || ($item == Yii::app()->getVersionBit()))
            return false;

        $loadItems = file('protected/core_conf/items/items.txt');
        foreach($loadItems as $itemLine)
        {
            $iArray     = explode('|',$itemLine);
            $itemId     = $iArray['2'];
            $itemType   = $iArray['1'];
            $stickLevel = $iArray['11'];

            if($stickLevel)
                $itembase_array[$itemType.';'.$itemId.';'.$stickLevel] = $iArray;
            else
                $itembase_array[$itemType.';'.$itemId] = $iArray;
        }

        $item_id 	= hexdec(substr($item,0,2));
        $iop 		= hexdec(substr($item,2,2));
        $itemdur	= hexdec(substr($item,4,2));
        $serial		= substr($item,6,8);
        $ioo 		= hexdec(substr($item,14,2));
        $ac			= hexdec(substr($item,16,2));
        $itt 		= hexdec(substr($item,18,2));
        $h_option 	= hexdec(substr($item,20,1));
        $h_value 	= hexdec(substr($item,21,1));
        $sockets 	= substr($item,-10);
        $item_type 	= $itt / 16;

        $getItems	= $itembase_array[$item_type.';'.$item_id.';'.floor($iop / 8)];

        if(!$getItems)
        {
            $getItems	= $itembase_array[$item_type.';'.$item_id];
            $nolevel		= 0;
        }
        else {
            $nolevel 		= 1;
        }

        //	SKILL INFO
        if ($iop < 128)
            $skill	= '';
        else
            //$skill	= Item::getSkill('ware',$getItems['7']).' skill (Mana:9)';	//	VIEW
            $iop	= $iop - 128;

        //	ITEM LEVEL
        $itemlevel	= floor($iop / 8);
        $iop		= $iop - $itemlevel * 8;
        //	LUCK INFO
        if($iop < 4) {
            $luck_	= '';
        }
        else {
            $luck	= 'Luck (success rate of jewel of soul +25%)<br>Luck (critical damage rate +5%)';	//	VIEW
            $luck_	= '+Luck';
            $iop	= $iop - 4;
        }
        //	EXE INFO
        if($ioo	>=	64)	{ $iop += 4; $ioo += -64; }
        if($ioo	<	32)	{ $iopx6 = 0; } else { $iopx6 = 1; $ioo += -32; }
        if($ioo	<	16)	{ $iopx5 = 0; } else { $iopx5 = 1; $ioo += -16; }
        if($ioo	<	8)	{ $iopx4 = 0; } else { $iopx4 = 1; $ioo += -8; }
        if($ioo	<	4)	{ $iopx3 = 0; } else { $iopx3 = 1; $ioo += -4; }
        if($ioo	<	2)	{ $iopx2 = 0; } else { $iopx2 = 1; $ioo += -2; }
        if($ioo	<	1)	{ $iopx1 = 0; } else { $iopx1 = 1; $ioo += -1; }
        //	380LVL INFO
        //$refop	= '';
        if (!$getItems)
        {
            $newtype		= (int)($item_type - 0.5);
            $getItems	= $itembase_array[$newtype.';'.$item_id];
            //$nolevel		= 0;
            if ($getItems)
            {
                $refinery	= array ('Additional Damage +200','', 'Additional Damage +200','','Additional Damage +200','Additional Damage +200','Additional Damage +200','SD recovery rate increase +20%','SD auto recovery','Defensive skill +200','Max. HP increase +200','Max. SD increase +700');
                $refop		= '<br><b><font color=pink>'.$refinery[$newtype];	//	VIEW
                if ($newtype < 7)
                {
                    $refop2	= 'Attack success rate increase +10';
                    if ($skill)	$skill	= Item::getSkill('ware',$getItems[7]).' skill (Mana:9)';	//	VIEW
                }
                else
                {
                    $refop2	= 'Defense success rate increase +10';
                }
                $refop 		.= '<br>'.$refop2.'</font></b><br>';
            }
        }
        $stick_level	= $getItems['11'];
        $iopxltype		= $getItems['6'];
        $itemname		= $getItems['5'];
        
        if(!$getItems) return false;

        //	REFINERY INFO
        if ($getItems['1'] < 5) {
            $harm_opt	= array(
                '1'		=> 'Min. attack increase',
                '2'		=> 'Max. attack increase',
                '3'		=> 'Required strength decrease',
                '4'		=> 'Required agility decrease',
                '5'		=> 'Attack increase(Min,Max)',
                '6'		=> 'Critical damage increase',
                '7'		=> 'Skill attack increase',
                '8'		=> 'Attack sucess rate increase(PVP)',
                '9'		=> 'SD decrement increase',
                '10'	=> 'SD bypass rate increase'
            );
            $harm_val	= array(
                '1'		=>	array(' +2',' +3',' +4',' +5',' +6',' +7',' +9',' +11',' +12',' +14',' +15',' +16',' +17',' +20'),
                '2'		=>	array(' +3',' +4',' +5',' +6',' +7',' +8',' +10',' +12',' +14',' +17',' +20',' +23',' +26',' +29'),
                '3'		=>	array(' -6',' -8',' -10',' -12',' -14',' -16',' -20',' -23',' -26',' -29',' -32',' -35',' -37',' -40'),
                '4'		=>	array(' -6',' -8',' -10',' -12',' -14',' -16',' -20',' -23',' -26',' -29',' -32',' -35',' -37',' -40'),
                '5'		=>	array('','','','','','',' +7',' +8',' +9',' +11',' +12',' +14',' +16',' +19'),
                '6'		=>	array('','','','','','',' +12',' +14',' +16',' +18',' +20',' +22',' +24',' +30'),
                '7'		=>	array('','','','','','','','','',' +12',' +14',' +16',' +18',' +22'),
                '8'		=>	array('','','','','','','','','',' +5',' +7',' +9',' +11',' +14'),
                '9'		=>	array('','','','','','','','','',' +3',' +5',' +7',' +9',' +10'),
                '10'	=>	array('','','','','','','','','','','','','',' +10'),
            );
            $harmony	= $harm_opt[$h_option].$harm_val[$h_option][$h_value];
        }
        if ($getItems['1'] == 5)
        {
            $harm_opt	= array(
                '1'		=> 'Wizardry increase',
                '2'		=> 'Required strength decrease',
                '3'		=> 'Required agility decrease',
                '4'		=> 'Skill attack increase',
                '5'		=> 'Critical damage increase',
                '6'		=> 'SD decrement increase',
                '7'		=> 'Attack success rate increase(PVP)',
                '8'		=> 'SD bypass rate increase',
            );
            $harm_val	= array(
                '1'		=>	array(' +6',' +8',' +10',' +12',' +14',' +16',' +17',' +18',' +19',' +21',' +23',' +25',' +27',' +31'),
                '2'		=>	array(' -6',' -8',' -10',' -12',' -14',' -16',' -20',' -23',' -26',' -29',' -32',' -35',' -37',' -40'),
                '3'		=>	array(' -6',' -8',' -10',' -12',' -14',' -16',' -20',' -23',' -26',' -29',' -32',' -35',' -37',' -40'),
                '4'		=>	array('','','','','','',' +7',' +10',' +13',' +16',' +19',' +22',' +25',' +30'),
                '5'		=>	array('','','','','','',' +10',' +12',' +14',' +16',' +18',' +20',' +22',' +28'),
                '6'		=>	array('','','','','','','','','',' +4',' +6',' +8',' +10',' +13'),
                '7'		=>	array('','','','','','','','','',' +5',' +7',' +9',' +11',' +14'),
                '8'		=>	array('','','','','','','','','','','','','',' +15'),
            );

            $harmony	= $harm_opt[$h_option].$harm_val[$h_option][$h_value];
        }
        if ($getItems['1'] > 5) {
            $harm_opt	= array(
                '1'		=> 'Defense increase',
                '2'		=> 'Max. AG increase',
                '3'		=> 'Max. HP increase',
                '4'		=> 'Life auto increment increase',
                '5'		=> 'Mana auto increment increase',
                '6'		=> 'Defense success rate increase(PVP)',
                '7'		=> 'Damage decrement increase',
                '8'		=> 'SD ratio increase',
            );
            $harm_val	= array(
                '1'		=>	array(' +3',' +4',' +5',' +6',' +7',' +8',' +10',' +12',' +14',' +16',' +18',' +20',' +22',' +25'),
                '2'		=>	array('','','',' +4',' +6',' +8',' +10',' +12',' +14',' +16',' +18',' +20',' +22',' +25'),
                '3'		=>	array('','','',' +7',' +9',' +11',' +13',' +15',' +17',' +19',' +21',' +23',' +25',' +30'),
                '4'		=>	array('','','','','','',' +1',' +2',' +3',' +4',' +5',' +6',' +7',' +8'),
                '5'		=>	array('','','','','','','','','',' +1',' +2',' +3',' +4',' +5'),
                '6'		=>	array('','','','','','','','','',' +3',' +4',' +5',' +6',' +8'),
                '7'		=>	array('','','','','','','','','',' +3',' +4',' +5',' +6',' +7'),
                '8'		=>	array('','','','','','','','','','','','','',' +5'),
            );
            $harmony	= $harm_opt[$h_option].$harm_val[$h_option][$h_value];
        }
        //	EXE TYPES
        switch ($iopxltype) {
            case 0 :
                $op1	= 'Increase acquisition rate of Mana after hunting monsters +Mana/8';
                $op2	= 'Increase acquisition rate of Life after hunting monsters +life/8';
                $op3	= 'Increase Attacking(Wizardry)speed +7';
                $op4	= 'Increase Damage +2%';
                $op5	= 'Increase Damage +level/20';
                $op6	= 'Excellent Damage Rate +10%';
                $inf	= 'Additional Dmg';
                break;
            case 1:
                $op1	= 'Increases acquisition rate of Zen after hunting monsters +30%';
                $op2	= 'Defense success rate +10%';
                $op3	= 'Reflect Damage +5%';
                $op4	= 'Damage Decrease +4%';
                $op5	= 'Increase Max Mana +4%';
                $op6	= 'Increase Max HP +4%';
                $inf	= 'Additional defense';
                //$skill	= '';
                break;
            case 2:
                $op1	= 'HP +50 increased';
                $op2	= 'Mana +50 increased';
                $op3	= 'Ignor opponents defensive power by 3%';
                $op4	= 'Max AG +50 increased';
                $op5	= 'Increase Attacking(Wizardry)speed +5';
                $op6	= NULL;
                $inf	= 'Additional Dmg';
                $skill	= '';
                $nocolor= true;
                break;
            case 4:
                $op1	= 'Ingor opponents defensive power by 5%';
                $op2	= 'Returns the enemys attack power in 5%';
                $op3	= 'Complete recovery of life in 5% rate';
                $op4	= 'Complete recover of Mana in 5% rate';
                $op5	= NULL;
                $op6	= NULL;
                $inf	= 'Additional Dmg';
                $skill	= '';
                $nocolor= true;
                break;
        }
        $itemexl = '';
        if ($getItems['6'] < 2) {
            if ($iopx6==1) 		$itemexl.='<br>'.$op6;
            if ($iopx5==1) 		$itemexl.='<br>'.$op5;
            if ($iopx4==1) 		$itemexl.='<br>'.$op4;
            if ($iopx3==1) 		$itemexl.='<br>'.$op3;
            if ($iopx2==1) 		$itemexl.='<br>'.$op2;
            if ($iopx1==1) 		$itemexl.='<br>'.$op1;
        }
        else {
            if ($iopx1==1) 		$itemexl.='<br>'.$op1;
            if ($iopx2==1) 		$itemexl.='<br>'.$op2;
            if ($iopx3==1) 		$itemexl.='<br>'.$op3;
            if ($iopx4==1) 		$itemexl.='<br>'.$op4;
            if ($iopx5==1) 		$itemexl.='<br>'.$op5;
            if ($iopx6==1) 		$itemexl.='<br>'.$op6;
        }
        if ($getItems['1'] <= 5) {
            $itemoption	= $iop*4;
        }
        elseif ($getItems['1'] == 6) {
            $itemoption	= $iop*5;
            $inf		= 'Additional defense rate ';
        }
        elseif ($getItems['1'] <= 11) {
            $itemoption	= $iop*4;
        }
        else {
            $itemoption	= ($iop).'%';
            $inf		= 'Automatic HP recovery ';
        }
        $c		= '#9AADD5';
        $tipche	= 0;
        if ($itemexl != '') {
            $c		= '#2FF387';
            $tipche	= 1;
        }
        if ($itemlevel > 6) {
            $c 		= '#F4CB3F';
            $tipche	= 0;
        }
        if ($itemoption == 0) $itemoption	= '';
        else {
            $itemoption 	= '+'.$itemoption;
            $itemoption_ 	= $inf.' '.$itemoption;
        }

        if ($nocolor) 	$c = '#F4CB3F';
        if (($getItems[1] == 13) && ($getItems[2] == 37)) {
            $skill		= '<br>Plasma storm skill (Mana:50)';
            $c			= '#9aadd5';
            $infodur	= '<br>Life: '.$itemdur.'<br>';
            $infoc		= 'Minimum Level Requirement: 300';
            if ($iopx1 == 1) {
                $itemname		.= ' +Destroy';
                $itemoption_	= 'Increase final damage 10%<br>Increase speed<br>';
            }
            elseif ($iopx2 == 1) {
                $itemname		.= ' +Protect';
                $itemoption_	= 'Absorb final damage 10%<br>Increase speed<br>';
            }
            elseif ($iopx3 == 1) {
                $itemname		.= ' +Illusion';
                $itemoption_	= 'Added 90 of Life<br>Added 90 of Mana<br>Added 15 Attack<br>Added 7 Wizardry<br>';
            }
            $itemoption_	.= '<br><font color=gold>Can summon the Fenrir when equipped</font>';
        }
        else {
            if ((!$nocolor) && ($itemexl != '') && ($itemname)) {
                $c	= 'mediumspringgreen';
                $exc_name = 'Exellent ';
            }
        }
        if ($getItems[1] == 12 && $getItems[2] == 15) { $c = 'gold'; $itemoption_ = '<font color=white>It is used to combine Chaos items</font>';}
        if ($getItems[1] == 14 && $getItems[2] == 13) { $c = 'gold'; $itemoption_ = '<font color=white>It is used to increase your item level up to 6</font>';}
        if ($getItems[1] == 14 && $getItems[2] == 14) { $c = 'gold'; $itemoption_ = '<font color=white>It is used to increase your item level up to 7,8,9</font>';}
        if ($getItems[1] == 14 && $getItems[2] == 16) { $c = 'gold'; $itemoption_ = '<font color=white>Increases item option by 1 level</font>';}
        if ($getItems[1] == 14 && $getItems[2] == 22) { $c = 'gold'; $itemoption_ = '<font color=white>Used to create fruits that increase stats</font>';}
        if ($getItems[1] == 14 && $getItems[2] == 31) { $c = 'gold'; $itemoption_ = '<font color=white>Create and improve items for siege</font>';}
        if ($getItems[1] == 14 && $getItems[2] == 41) { $c = 'gold'; $itemoption_ = '<font color=white>Jewel with impurities</font>';}
        if ($getItems[1] == 14 && $getItems[2] == 42) { $c = 'gold'; $itemoption_ = '<font color=white>Jewel for item reinforcement</font>';}
        if (($getItems[1] == 14 && $getItems[2] == 43) || ($getItems[1] == 14 && $getItems[2] == 44)) { $c = 'gold'; $itemoption_ = '<font color=white>Grant actual power to reinforced item</font>';}
        if ($getItems[1] == 13 && $getItems[2] == 0) $itemoption_ = '<font color=white>Absorb 20% of Damage<br>Max HP +50 increased<br>Life: '.$itemdur.'<br>Minimum Level Requirement: 27</font>';
        if ($getItems[1] == 13 && $getItems[2] == 1) $itemoption_ = '<font color=white>Increase 30% of attacking & Wizardry Dmg<br>Life: '.$itemdur.'<br>Minimum Level Requirement: 32</font>';
        if ($getItems[1] == 13 && $getItems[2] == 2) $itemoption_ = '<font color=white>Life: '.$itemdur.'<br>Minimum Level Requirement: 29</font>';
        if ($getItems[1] == 13 && $getItems[2] == 3) { $skill = ''; $itemoption_ = '<font color=white>Increase 15% of Damage<br>Absorb 10% of Damage<br>Life: '.$itemdur.'<br>Minimum Level Requirement: 114</font><br><br><font color=#9AADD5>Raid skill (Mana:9)</font><div style=color:#ffffff;background-color:#a00000;>Knight specific skill</div>';}
        if ($getItems[1] == 13 && $getItems[2] == 4) { $infoh = '<br>Life: '.$itemdur.'<br>Minimum Level Requirement: 218'; $skill = 'Earth shake skill (Mana:0)<br>Increase defensive skill +130<br>Absorb 15% additional damage<br>Increase 2 possible attack distance';}
        if ($getItems[1] == 13 && $getItems[2] == 5) { $infoh = '<br>Dmg(rate): 180~200 (1000)<br>Attack speed: 20<br>Life: '.$itemdur.'<br>Available command: 185'; }
        if ($getItems[1] == 13 && $getItems[2] == 64) $itemoption_ = '<font color=#9AADD5>Increases Attack Power and Wizadry by 40%</font><br><font color=#FF19FF>Increases Attack Speed by 10</font><br><font color=white>Life: '.$itemdur.'<br>Minimum Level Requirement: 5</font>';
        if ($getItems[1] == 13 && $getItems[2] == 65) $itemoption_ = '<font color=#9AADD5>Alleviates monsters damage by 30%</font><br><font color=#FF19FF>Increases Maximum Life by 50</font><br><font color=white>Life: '.$itemdur.'<br>Minimum Level Requirement: 5</font>';
        if ($getItems[1] == 13 && $getItems[2] == 67) $itemoption_ = '<font color=#9AADD5>Surrounding Zens are automatically collected</font><br><font color=white>Life: '.$itemdur.'<br>Minimum Level Requirement: 32</font>';
        if ($getItems[1] == 13 && $getItems[2] == 80) $itemoption_ = '<font color=#9AADD5>Auto-collects zen around you<br>EXP Rate 50% increase<br>Increase Defensive Skill +50</font><br><font color=white>Life: '.$itemdur.'<br>Minimum Level Requirement: 5</font>';
        if ($getItems[1] == 13 && $getItems[2] == 123) $itemoption_ = '<font color=#9AADD5>Surrounding Zens are automatically collected<br>Increase Damage,Wizardry and Curse by 20%<br>Increases Attack Speed by 10<br>EXP Rate 30% increase</font><br><font color=white>Life: '.$itemdur.'<br>Minimum Level Requirement: 5</font>';
        if ($getItems[1] == 12 && ($getItems[2] == 30 || $getItems[2] == 31) && $getItems[11] == 0) { $c = 'gold'; $itemoption_ = '<font color=white>10';}
        if ($getItems[1] == 12 && ($getItems[2] == 30 || $getItems[2] == 31) && $getItems[11] == 1) { $c = 'gold'; $itemoption_ = '<font color=white>20';}
        if ($getItems[1] == 12 && ($getItems[2] == 30 || $getItems[2] == 31) && $getItems[11] == 2) { $c = 'gold'; $itemoption_ = '<font color=white>30';}
        if ($getItems[1] == 12 && $getItems[2] == 30) $itemoption_ .= ' Jewel of Bless is combined<br>Can be used after dismantling</font>';
        if ($getItems[1] == 12 && $getItems[2] == 31) $itemoption_ .= ' Jewel of Soul is combined<br>Can be used after dismantling</font>';
        // ANCIENT INFO
        if ($ac == 4) $ac = 5;
        if ($ac == 9) $ac = 10;
        if ($ac > 0) {
            if($ac == 5		&& $getItems[31] != '-')	{	$anc_set	= $getItems[31];	}
            if(($ac == 6 || $ac == 10)	&& $getItems[32] != '-')	{	$anc_set	= $getItems[32];	}
            if 		($anc_set == 'Warrior') 	{$an = 'Increase strength +10<br>Increase skill attacking rate +10<br>Increase max. AG +20<br>Increase AG increase rate +5<br>Increase defensive skill +20<br>Increase agility +10<br>Increase critical damage rate 5%<br>Increase excellent damage rate 5%<br>Increase strength +25';}
            elseif 	($anc_set == 'Anonymous')	{$an = 'Increase max. life +50<br>Increase agility +50<br>Increase defensive skill when using shield weapons 25%<br>Increase damage +30';}
            elseif 	($anc_set == 'Hyperion') 	{$an = 'Increase energy +15<br>Increase agility +15<br>Increase skill attacking rate +20<br>Increase max. mana +30';}
            elseif 	($anc_set == 'Mist') 		{$an = 'Increase stamina +20<br>Increase skill attacking rate +30<br>Double damage rate 10%<br>Increase agility +20';}
            elseif 	($anc_set == 'Eplete') 		{$an = 'Increase skill attacking rate +15<br>Increase damage success rate +50<br>Increase Wizadry Dmg +5%<br>Increase max. life +50<br>Increase max. AG +30<br>Increase critical damage rate 10%<br>Increase excellent damage rate 10%';}
            elseif 	($anc_set == 'Berserker') 	{$an = 'Increase max. damage +10<br>Increase max. damage +20<br>Increase max. damage +30<br>Increase max. damage +40<br>Increase skill arracking rate +40<br>Increase strength +40';}
            elseif 	($anc_set == 'Garuda') 		{$an = 'Increase max. AG +30<br>Double damage rate 5%<br>Increase energy +15<br>Increase max. life +50<br>Increase skill attacking rate +25<br>Increase Wizardry Dmg +15%';}
            elseif 	($anc_set == 'Cloud') 		{$an = 'Increase critical damage rate 20%<br>Increase critical damage +50';}
            elseif 	($anc_set == 'Kantata') 	{$an = 'Increase energy +15<br>Increase stamina +30<br>Increase Wizardry Dmg +10%<br>Increase strength +15<br>Increase skill attacking rate +25<br>Increase excellent damage rate 10%<br>Increase excellent damage +20';}
            elseif 	($anc_set == 'Rave') 		{$an = 'Increase skill attacking rate +20<br>Double damage rate 10%<br>Increase damage when using two handed weapons +30%<br>Ignore enemies defensive skill 5%';}
            elseif 	($anc_set == 'Hyon') 		{$an = 'Increase defensive skill +25<br>Double damage rate 10%<br>Increase skill attacking rate +20<br>Increase critical damage rate 15%<br>Increase excellent damage rate 15%<br>Increase critical damage +20<br>Increase excellent damage +20';}
            elseif 	($anc_set == 'Vicious') 	{$an = 'Increase skill attacking rate +15<br>Increase damage +15<br>Double damage rate 10%<br>Increase min. damage +20<br>Increase max. damage +30<br>Ignore enemies defensive skill 5%';}
            elseif 	($anc_set == 'Apollo') 		{$an = 'Increase energy +10<br>Increase Wizardry Dmg +5%<br>Increase skill attacking rate +10<br>Increase max. mana +30<br>Increase max. life +30<br>Increase max. AG +20<br>Increase critical damage rate 10%<br>Increase excellent damage rate 10%<br>Increase energy +30';}
            elseif 	($anc_set == 'Barnake') 	{$an = 'Increase Wizardry Dmg +10%<br>Increase energy +20<br>Increase skill attacking rate +30<br>Increase max. mana +100';}
            elseif 	($anc_set == 'Evis') 		{$an = 'Increase skill attacking rate +15<br>Increase stamina +20<br>Increase Wizardry Dmg 10%<br>Double damage rate 5%<br>Increase damage succes rate +50<br>Increase AG increase rate +5';}
            elseif 	($anc_set == 'Sylion') 		{$an = 'Double damage rate 5%<br>Increase critical damage rate 5%<br>Increase defensive skill +20<br>Increase strength +50<br>Increase agility +50<br>Increase stamina +50<br>Increase energy +50';}
            elseif 	($anc_set == 'Heras') 		{$an = 'Increase strength +15<br>Increase Wizardry Dmg +10%<br>Increase defensive skill when using shield weapons 5%<br>Increase energy +15<br>Increase damage success rate +50<br>Increase critical damage rate 10%<br>Increase excellent damage rate 10%<br>Icrease max. life +50<br>Increase max. mana +50';}
            elseif 	($anc_set == 'Minet') 		{$an = 'Increase energy +30<br>Increase defensive skill +30<br>Increase max. mana +100<br>Increase skill attacking rate +15';}
            elseif 	($anc_set == 'Anubis') 		{$an = 'Double damage rate 10%<br>Increase max. mana +50<br>Increase Wizardry Dmg +10%<br>Increase critical damage rate 15%<br>Increase excellent damage rate 15%<br>Increase critical damage +20<br>Increase excellent damage +20';}
            elseif 	($anc_set == 'Enis') 		{$an = 'Increase skill attacking rate +10<br>Double damage rate 10%<br>Increase energy +30<br>Increase Wizardry Dmg +10%<br>Ignore enemies defensive skill 5%';}
            elseif 	($anc_set == 'Ceto') 		{$an = 'Increase agility +10<br>Increase max. life +50<br>Increase defensive skill +20<br>Increase defensive skill when using shield weapons 5%<br>Increase energy +10<br>Increase max. life +50<br>Increase strength +20';}
            elseif 	($anc_set == 'Drake') 		{$an = 'Increase agility +20<br>Increase damage +25<br>Double damage rate 20%<br>Increase defensive skill +40<br>Increase critical damage rate 10%';}
            elseif 	($anc_set == 'Gaia') 		{$an = 'Increase skill attacking rate +10<br>Increase max. mana +25<br>Increase strength +10<br>Double damage rate 5%<br>Increase agility +30<br>Increase excellent damage rate 10%<br>Increase excellent damage +10';}
            elseif 	($anc_set == 'Fase') 		{$an = 'Increase max. life +100<br>Increase max. mana +100<br>Increase defensive skill +100';}
            elseif 	($anc_set == 'Odin') 		{$an = 'Increase energy +15<br>Increase max. life +50<br>Increase damage success rate +50<br>Increase agility +30<br>Increase max. mana +50<br>Ignore enemies defensive skill 5%<br>Increase max. AG +50';}
            elseif 	($anc_set == 'Elvian') 		{$an = 'Increase agility +30<br>Ignore enemies defensive skill 5%';}
            elseif 	($anc_set == 'Argo') 		{$an = 'Increase max. damage +20<br>Increase skill attacking rate +25<br>Increase max. AG +50<br>Double damage rate 5%';}
            elseif 	($anc_set == 'Karis') 		{$an = 'Increase skill attacking rate +15<br>Double damage rate 10%<br>Increase critical damage rate 10%<br>Increase agility +40';}
            elseif 	($anc_set == 'Gywen') 		{$an = 'Increase agility +30<br>Increase min. damage +20<br>Increase defensive skill +20<br>Increase max. damage +20<br>Increase critical damage rate 15%<br>Increase excellent damage rate 15%<br>Increase critical damage +20<br>Increase excellent damage +20';}
            elseif 	($anc_set == 'Aruan') 		{$an = 'Increase damage +10<br>Double damage rate 10%<br>Increase skill attacking rate +20<br>Increase critical damage rate 15%<br>Increase excellent damage rate 15%<br>Ignore enemies defensive skill 5%';}
            elseif 	($anc_set == 'Gaion') 		{$an = 'Ignore enemies defensive skill 5%<br>Double damage rate 15%<br>Increase skill attacking rate +15<br>Increase excellent damage rate 15%<br>Increase excellent damage +30<br>Increase Wizardry Dmg +10%<br>Increase strength +30';}
            elseif 	($anc_set == 'Muren') 		{$an = 'Increase skill attacking rate +10<br>Increase Wizardry Dmg +10%<br>Double damage rate 10%<br>Increase critical damage rate 15%<br>Increase excellent damage rate 15%<br>Increase defensive skill +25<br>Increase damage when using two handed weaspons +20%';}
            elseif 	($anc_set == 'Agnis') 		{$an = 'Double damage rate 10%<br>Increase defensive skill +40<br>Increase skill attacking rate +20<br>Increase critical damage rate 15%<br>Increase excellent damage rate 15%<br>Increase critical damage +20<br>Increase excellent damage +20';}
            elseif 	($anc_set == 'Broy') 		{$an = 'Increase damage +20<br>Increase skill attacking rate +20<br>Increase energy +30<br>Increase critical damage rate 15%<br>Increase excellent damage rate 15%<br>Ignore enemies defensive skill 5%<br>Increase command +30';}
            elseif 	($anc_set == 'Chrono') 		{$an = 'Double damage rate 20%<br>Increase defensive skill +60<br>Increase skill attacking rate +30<br>Increase critical damage rate 15%<br>Increase excellent damage rate 15%<br>Increase critical damage +20<br>Increase excellent damage +20';}
            elseif	($anc_set == 'Semeden') 	{$an = 'Increase Wizardry Dmg +15%<br>Increase skill attacking rate +25<br>Increase energy +30<br>Increase critical damage rate 15%<br>Increase excellent damage rate 15%<br>Ignore enemies defensive skill 5%';}
            elseif	($anc_set == 'Vega') 		{$an = 'Increase damage success rate +50<br>Increase stamina +50<br>Increase max damage +30<br>Increase excellent damage rate 15%<br>Double damage rate 5%<br>Ignore enemies defensive skill 5%';}
            elseif	($anc_set == 'Chameren') 	{$an = 'Increase defensive skill +50<br>Double damage rate 5%<br>Increase damage +30<br>Increase critical damage +30<br>Increase excellent damage rate 15%<br>Increase skill attacking rate +30<br>Increase excellent damage +20';}
            else	{	$an = 'Sorry, but we dont have info<br>about this set item';	}
            $anc_set	.= '\'s ';
            $c	= 'springgreen;background-color:blue;';
            $acinfo		= '<br>Increase Stamina +'.$ac.'<br>';
            $ancinfo	= '<br><br><font color=gold>Set item option info</font><br><br><font color=#666666>'.$an.'</font>';
            $tipche		= 2;
        }
        //	SOCKET INFO
        $sock = array();
        if($sockets!='FFFFFFFFFF' && $sockets!='0000000000') {
            $c = '#B266FF';
            $s = array(
                'FE' => '<font color=#666666>No item application</font>',		//	254
                '00' => 'Fire((Level type)Attack/Wizardry increase +19)',		//	0
                '01' => 'Fire(Attack speed increase +7)',						//	1
                '02' => 'Fire(Maximum attack/Wizardry increase +30)',			//	2
                '03' => 'Fire(Minimum attack/Wizardry increase +20)',			//	3
                '04' => 'Fire(Attack/Wizardry increase +20)',					//	4
                '05' => 'Fire(AG cost decrease +40%)',							//	5
                '0A' => 'Water(Block rating increase +10%)',					//	10
                '0B' => 'Water(Defense increase +30)',							//	11
                '0C' => 'Water(Shield protection increase +7%)',				//	12
                '0D' => 'Water(Damage reduction +4%)',							//	13
                '0E' => 'Water(Damage reflection +5%)',							//	14
                '10' => 'Ice(Monster destruction for the Life increase +56)',	//	16
                '11' => 'Ice(Monster destruction for the Mana increase +56)',	//	17
                '12' => 'Ice(Skill attack increase +37)',						//	18
                '13' => 'Ice(Attack rating increase +25)',						//	19
                '14' => 'Ice(Item durability increase +30%)',					//	20
                '15' => 'Wind(Automatic Life recovery increase +8)',			//	21
                '16' => 'Wind(Maximum Life increase +4%)',						//	22
                '17' => 'Wind(Maximum Mana increase +4%)',						//	23
                '18' => 'Wind(Automatic Mana recovery increase +7)',			//	24
                '19' => 'Wind(Maximum AG increase +25)',						//	25
                '1A' => 'Wind(AG value increase +3)',							//	26
                '1D' => 'Lightning(Excellent damage increase +15)',				//	29
                '1E' => 'Lighting(Excellent damage rate increase +10%)',		//	30
                '1F' => 'Lighting(Critical damage increase +30)',				//	31
                '20' => 'Lighting(Critical damage rate increase +8%)',			//	32
                '24' => 'Ground(Health increase +30)',							//	36
                '32' => 'Fire((Level type)Attack/Wizardry increase +20)',		//	50
                '33' => 'Fire(Attack speed increase +8)',						//	51
                '34' => 'Fire(Maximum attack/Wizardry increase +32)',			//	52
                '35' => 'Fire(Minimum attack/Wizardry increase +22)',			//	53
                '36' => 'Fire(Attack/Wizardry increase +22)',					//	54
                '37' => 'Fire(AG cost decrease +41%)',							//	55
                '3C' => 'Water(Block rating increase +11%)',					//	60
                '3D' => 'Water(Defense increase +33)',							//	61
                '3E' => 'Water(Shield protection increase +10%)',				//	62
                '3F' => 'Water(Damage reduction +5%)',							//	63
                '40' => 'Water(Damage reflection +6%)',							//	64
                '42' => 'Ice(Monster destruction for the Life increase +64)',	//	66
                '43' => 'Ice(Monster destruction for the Mana increase +64)',	//	67
                '44' => 'Ice(Skill attack increase +40)',						//	68
                '45' => 'Ice(Attack rating increase +27)',						//	69
                '46' => 'Ice(Item durability increase +32%)',					//	70
                '47' => 'Wind(Automatic Life recovery increase +10)',			//	71
                '48' => 'Wind(Maximum Life increase +5%)',						//	72
                '49' => 'Wind(Maximum Mana increase +5%)',						//	73
                '4A' => 'Wind(Automatic Mana recovery increase +14)',			//	74
                '4B' => 'Wind(Maximum AG increase +30)',						//	75
                '4C' => 'Wind(AG value increase +5)',							//	76
                '4F' => 'Lightning(Excellent damage increase +20)',				//	79
                '50' => 'Lighting(Excellent damage rate increase +11%)',		//	80
                '51' => 'Lighting(Critical damage increase +32)',				//	81
                '52' => 'Lighting(Critical damage rate increase +9%)',			//	82
                '59' => 'Ground(Health increase +32)',							//	86
                '64' => 'Fire((Level type)Attack/Wizardry increase +21)',		//	100
                '65' => 'Fire(Attack speed increase +9)',						//	101
                '66' => 'Fire(Maximum attack/Wizardry increase +35)',			//	102
                '67' => 'Fire(Minimum attack/Wizardry increase +25)',			//	103
                '68' => 'Fire(Attack/Wizardry increase +25)',					//	104
                '69' => 'Fire(AG cost decrease +42%)',							//	105
                '6E' => 'Water(Block rating increase +12%)',					//	110
                '6F' => 'Water(Defense increase +36)',							//	111
                '70' => 'Water(Shield protection increase +15%)',				//	112
                '71' => 'Water(Damage reduction +6%)',							//	113
                '72' => 'Water(Damage reflection +7%)',							//	114
                '74' => 'Ice(Monster destruction for the Life increase +74)',	//	116
                '75' => 'Ice(Monster destruction for the Mana increase +74)',	//	117
                '76' => 'Ice(Skill attack increase +45)',						//	118
                '77' => 'Ice(Attack rating increase +30)',						//	119
                '78' => 'Ice(Item durability increase +34%)',					//	120
                '79' => 'Wind(Automatic Life recovery increase +13)',			//	121
                '7A' => 'Wind(Maximum Life increase +6%)',						//	122
                '7B' => 'Wind(Maximum Mana increase +6%)',						//	123
                '7C' => 'Wind(Automatic Mana recovery increase +21)',			//	124
                '7D' => 'Wind(Maximum AG increase +35)',						//	125
                '7E' => 'Wind(AG value increase +7)',							//	126
                '81' => 'Lightning(Excellent damage increase +25)',				//	129
                '82' => 'Lighting(Excellent damage rate increase +12%)',		//	130
                '83' => 'Lighting(Critical damage increase +35)',				//	131
                '84' => 'Lighting(Critical damage rate increase +10%)',			//	132
                '88' => 'Ground(Health increase +34)',							//	136
                '96' => 'Fire((Level type)Attack/Wizardry increase +22)',		//	150
                '97' => 'Fire(Attack speed increase +10)',						//	151
                '98' => 'Fire(Maximum attack/Wizardry increase +40)',			//	152
                '99' => 'Fire(Minimum attack/Wizardry increase +30)',			//	153
                '9A' => 'Fire(Attack/Wizardry increase +30)',					//	154
                '9B' => 'Fire(AG cost decrease +43%)',							//	155
                'A0' => 'Water(Block rating increase +13%)',					//	160
                'A1' => 'Water(Defense increase +39)',							//	161
                'A2' => 'Water(Shield protection increase +20%)',				//	162
                'A3' => 'Water(Damage reduction +7%)',							//	163
                'A4' => 'Water(Damage reflection +8%)',							//	164
                'A6' => 'Ice(Monster destruction for the Life increase +89)',	//	166
                'A7' => 'Ice(Monster destruction for the Mana increase +89)',	//	167
                'A8' => 'Ice(Skill attack increase +50)',						//	168
                'A9' => 'Ice(Attack rating increase +35)',						//	169
                'AA' => 'Ice(Item durability increase +36%)',					//	170
                'AB' => 'Wind(Automatic Life recovery increase +16)',			//	171
                'AC' => 'Wind(Maximum Life increase +7%)',						//	172
                'AD' => 'Wind(Maximum Mana increase +7%)',						//	173
                'AE' => 'Wind(Automatic Mana recovery increase +28)',			//	174
                'AF' => 'Wind(Maximum AG increase +40)',						//	175
                'B0' => 'Wind(AG value increase +10)',							//	176
                'B3' => 'Lightning(Excellent damage increase +30)',				//	179
                'B4' => 'Lighting(Excellent damage rate increase +13%)',		//	180
                'B5' => 'Lighting(Critical damage increase +40)',				//	181
                'B6' => 'Lighting(Critical damage rate increase +11%)',			//	182
                'BA' => 'Ground(Health increase +36)',							//	186
                'C8' => 'Fire((Level type)Attack/Wizardry increase +27)',		//	200
                'C9' => 'Fire(Attack speed increase +11)',						//	201
                'CA' => 'Fire(Maximum attack/Wizardry increase +50)',			//	202
                'CB' => 'Fire(Minimum attack/Wizardry increase +35)',			//	203
                'CC' => 'Fire(Attack/Wizardry increase +35)',					//	204
                'CD' => 'Fire(AG cost decrease +44%)',							//	205
                'D2' => 'Water(Block rating increase +14%)',					//	210
                'D3' => 'Water(Defense increase +42)',							//	211
                'D4' => 'Water(Shield protection increase +30%)',				//	212
                'D5' => 'Water(Damage reduction +8%)',							//	213
                'D6' => 'Water(Damage reflection +9%)',							//	214
                'D8' => 'Ice(Monster destruction for the Life increase +112)',	//	216
                'D9' => 'Ice(Monster destruction for the Mana increase +112)',	//	217
                'DA' => 'Ice(Skill attack increase +60)',						//	218
                'DB' => 'Ice(Attack rating increase +40)',						//	219
                'DC' => 'Ice(Item durability increase +38%)',					//	220
                'DD' => 'Wind(Automatic Life recovery increase +20)',			//	221
                'DE' => 'Wind(Maximum Life increase +8%)',						//	222
                'DF' => 'Wind(Maximum Mana increase +8%)',						//	223
                'E0' => 'Wind(Automatic Mana recovery increase +35)',			//	224
                'E1' => 'Wind(Maximum AG increase +50)',						//	225
                'E2' => 'Wind(AG value increase +15)',							//	226
                'E5' => 'Lightning(Excellent damage increase +40)',				//	229
                'E6' => 'Lighting(Excellent damage rate increase +14%)',		//	230
                'E7' => 'Lighting(Critical damage increase +50)',				//	231
                'E8' => 'Lighting(Critical damage rate increase +12%)',			//	232
                'EC' => 'Ground(Health increase +38)'							//	236
            );

            $l = 1;
            for($i=0;$i<10;$i=$i+2) {
                $sock[] = (isset($s[substr($sockets,$i,2)])?'Socket '.$l.': '.$s[substr($sockets,$i,2)]:'');
                $l++;
            }
        }
        $sockets_ = '';
        if($sock) {
            $sockets_ = '<br><font color=#FF19FF>Socket item option info</font><br>';
            foreach($sock as $v) {
                if($v) $sockets_ .= '<br><font color=#60A0FF>'.$v.'</font>';
            }
        }
        if ($nolevel == 1)	{	$ilvl	= 0;			}
        else				{	$ilvl	= $itemlevel;	}


        $newdef		= $getItems[15] + ($ilvl * 3);
        $newmindmg	= $getItems[12] + ($ilvl * 3);
        $newmaxdmg	= $getItems[13] + ($ilvl * 3);
        if ($ilvl <= 4) {
            $newdur	= $getItems[17] + ($ilvl * 1);
        }
        if ($ilvl > 4) $newdur	= $getItems[17] + (($ilvl-2) * 2);
        if ($ilvl > 9) {
            $newdef += $ilvl - 9;
            $newdur	= $getItems[17] + (($ilvl*2)-3);
            $newmindmg	+= 1;
            $newmaxdmg	+= 1;
        }
        if ($ilvl > 10) {
            $newdef += $ilvl - 10;
            $newdur	= $getItems[17] + (($ilvl*2)-1);
            $newmindmg	+= 2;
            $newmaxdmg	+= 2;
        }
        if ($ilvl > 11) {
            $newdef += $ilvl - 11;
            $newdur	= $getItems[17] + (($ilvl+1)*2);
            $newmindmg	+= 3;
            $newmaxdmg	+= 3;
        }
        if ($ilvl > 12) {
            $newdef += $ilvl - 12;
            $newdur	= $getItems[17] + (($ilvl+3)*2);
            $newmindmg	+= 4;
            $newmaxdmg	+= 4;
        }
        if ($ilvl > 13) {
            $newdef += $ilvl - 13;
            $newdur	= $getItems[17] + $ilvl*2 + 11;
            $newmindmg	+= 5;
            $newmaxdmg	+= 5;
        }
        if ($ilvl > 14) {
            $newdef += $ilvl - 14;
            $newdur	= $getItems[17] + $ilvl*2 + 17;
            $newmindmg	+= 6;
            $newmaxdmg	+= 6;
        }
        if ($itemexl != NULL) {
            $newdef += 16;
            $newdur += 15;
            $newmindmg	+= 30;
            $newmaxdmg	+= 30;
            $exlcols	= '<font color=#9aadd5>';
            $exlcole	= '</font>';
        }
        if ($ac > 0) {
            $newdef += 20;
            $newdur += 20;
            $newmindmg	+= 36;
            $newmaxdmg	+= 36;
        }

        if($ilvl) {
            $ilvl	= ' +'.$ilvl;
        }
        else {
            $ilvl	= NULL;
        }
        if(!$ilvl) {
            if($itemoption_) {
                $ilvl	= '';
            }
        }
        if ($harmony)		{	$harmony		= '<br><font color=yellow><b>'.$harmony.'</b></font><br>';	}
        if ($itemoption_)	{	$itemoption_	= '<br><font color=#9aadd5>'.$itemoption_.'</font>';		}
        if ($luck) 			{	$luck 			= '<br><font color=#9aadd5>'.$luck.'</font>';				}
        if ($skill) 		{	$skill 			= '<br><font color=#9aadd5>'.$skill.'</font>';				}
        if($itemexl) 		{	$itemexl 		= '<font color=#9aadd5>'.$itemexl.'</font>';				}
        if ($item_type <= 5) {
            if ($getItems[3] == 1)	{ $ihands = 'One-Handed'; }
            else 						{ $ihands = 'Two-Handed'; }
            $infoa	=	'<br>'.$exlcols.$ihands.' Damage: '.$newmindmg.' ~ '.$newmaxdmg.$exlcole;
            $infob	=	'<br>Attack Speed: '.$getItems[14];
        }
        elseif ($item_type == 6) {
            $infoa	=	'<br>Defense: '.$getItems[15];
            $infob	=	'<br>'.$exlcols.'Defense Rate: '.$getItems[16].$exlcole;
        }
        elseif ($item_type <= 11) {
            $infoa	=	'<br>'.$exlcols.'Defense: '.$newdef.$exlcole;
            $infob	=	'';
        }
        else {
            $infoa	=	'';
            $infob	=	'';
        }
        if ($getItems[18] > 0) 	{	$infoc		=	'<br>Minimum Level Requirement: '.$getItems[18];	}
        if ($getItems[19] > 0) 	{	$infod		=	'<br>Strength Requirement: '.$getItems[19];		}
        if ($getItems[20] > 0)	{   $infoe		=	'<br>Agility Requirement: '.$getItems[20];			}
        if ($getItems[21] > 0) 	{	$infof		=	'<br>Energy Requirement: '.$getItems[21];			}
        if ($getItems[22] > 0) 	{	$infog		=	'<br>Vitality Requirement: '.$getItems[22];		}
        if ($getItems[23] > 0) 	{	$infoh		=	'<br>Command Requirement: '.$getItems[23];			}
        if ($getItems[6] != '-1')	{	$infodur	=	'<br>Durability: ['.$itemdur.'/'.$newdur.']';			}

        if ($getItems[1] == 10 && $ilvl > 4)	$iteminca	= '<br><b>Swimming speed increase</b><br>';
        if ($getItems[1] == 11 && $ilvl > 4)	$itemincb	= '<br><b>Increases moving speed</b><br>';

        if (($getItems['24'] == 1 || $getItems['24'] == 2) &&
            ($getItems['25'] == 1 || $getItems['25'] == 2) &&
            ($getItems['26'] == 1 || $getItems['26'] == 2) &&
            ($getItems['27'] == 1 || $getItems['27'] == 3) &&
            ($getItems['28'] == 1 || $getItems['28'] == 3) &&
            ($getItems['29'] == 1 || $getItems['29'] == 2) &&
            ($getItems['30'] == 1 || $getItems['30'] == 3)) {
            //
        }
        else {
            if ($getItems[24] == 0 && $getItems[25] == 0 && $getItems[26] == 0 && $getItems[27] == 0 && $getItems[28] == 0 && $getItems[29] == 0 && $getItems[30] == 0) {
                //
            }
            else {
                $itembr = '<br><br>';
            }
            if ($getItems['24'] == 1) { $itemdw	= '<div style=color:#ffffff;background-color:#a00000;>Can be equipped by Dark Wizard</div>';}
            if ($getItems['24'] == 2) { $itemdw	= '<div style=color:#ffffff;background-color:#a00000;>Can be equipped by Soul Master</div>';}
            if ($getItems['24'] == 3) { $itemdw	= '<div style=color:#ffffff;background-color:#a00000;>Can be equipped by Grand Master</div>';}
            if ($getItems['25'] == 1) { $itemdk	= '<div style=color:#ffffff;background-color:#a00000;>Can be equipped by Dark Knight</div>';}
            if ($getItems['25'] == 2) { $itemdk	= '<div style=color:#ffffff;background-color:#a00000;>Can be equipped by Blade Knight</div>';}
            if ($getItems['25'] == 3) { $itemdk	= '<div style=color:#ffffff;background-color:#a00000;>Can be equipped by Blade Master</div>';}
            if ($getItems['26'] == 1) { $itemelf	= '<div style=color:#ffffff;background-color:#a00000;>Can be equipped by Fairy Elf</div>';}
            if ($getItems['26'] == 2) { $itemelf	= '<div style=color:#ffffff;background-color:#a00000;>Can be equipped by Muse Elf</div>';}
            if ($getItems['26'] == 3) { $itemelf	= '<div style=color:#ffffff;background-color:#a00000;>Can be equipped by High Elf</div>';}
            if ($getItems['27'] == 1) { $itemmg	= '<div style=color:#ffffff;background-color:#a00000;>Can be equipped by Magic Gladiator</div>';}
            if ($getItems['27'] == 3) { $itemmg	= '<div style=color:#ffffff;background-color:#a00000;>Can be equipped by Duel Master</div>';}
            if ($getItems['28'] == 1) { $itemdl	= '<div style=color:#ffffff;background-color:#a00000;>Can be equipped by Dark Lord</div>';}
            if ($getItems['28'] == 3) { $itemdl	= '<div style=color:#ffffff;background-color:#a00000;>Can be equipped by Lord Emperror</div>';}
            if ($getItems['29'] == 1) { $itemsum	= '<div style=color:#ffffff;background-color:#a00000;>Can be equipped by Summoner</div>';}
            if ($getItems['29'] == 2) { $itemsum	= '<div style=color:#ffffff;background-color:#a00000;>Can be equipped by Bloody Summoner</div>';}
            if ($getItems['29'] == 3) { $itemsum	= '<div style=color:#ffffff;background-color:#a00000;>Can be equipped by Dimension Master</div>';}
            if ($getItems['30'] == 1) { $itemfm	= '<div style=color:#ffffff;background-color:#a00000;>Can be equipped by Rage Fighter</div>';}
            if ($getItems['30'] == 3) { $itemfm	= '<div style=color:#ffffff;background-color:#a00000;>Can be equipped by Fist Master</div>';}
        }

        $output['type']		= $item_type;
        $output['id']		= $item_id;
        $output['name']		= stripslashes($exc_name.$anc_set.$itemname);
        $output['X']		= $getItems['3'];
        $output['Y']		= $getItems['4'];
        $output['level']	= $ilvl;
        $output['color']	= $c;
        $output['sn']		= $serial;
        $output['thumb']	= Item::getImage($getItems['1'], $getItems['2'], $itemlevel, $tipche);
        $output['info']		= '<div style=color:'.$c.';><b>'.$exc_name.$anc_set.$itemname.$ilvl.'</b></div><font color=\'white\'>'.$infoa.$infob.$infodur.$infod.$infoe.$infof.$infog.$infoh.$infoc.'</font>'.$itembr.$itemdw.$itemdk.$itemelf.$itemmg.$itemdl.$itemsum.$itemfm.$iteminca.$itemincb.$refop.$harmony.$acinfo.$skill.$luck.$itemoption_.$itemexl.$ancinfo.$sockets_;
        $output['info_img']	= '<div style=color:'.$c.';><b>'.$exc_name.$anc_set.$itemname.$ilvl.'</b></div><br><img src='.$output['thumb'].'><br><font color=\'white\'>'.$infoa.$infob.$infodur.$infod.$infoe.$infof.$infog.$infoh.$infoc.'</font>'.$itembr.$itemdw.$itemdk.$itemelf.$itemmg.$itemdl.$itemsum.$itemfm.$refop.$harmony.$acinfo.$skill.$luck.$itemoption_.$itemexl.$ancinfo.$sockets_;
        return $output;
    }


    public static function getImage($type, $id, $level, $excanc)
    {
        switch ($excanc)
        {
            case 1:		$iexc	= 'excellent/';	break;
            case 2:		$iexc	= 'ancient/';	break;
            default:	$iexc	= '';			break;
        }
        if($level > 0)
        {
            $ilvl = '-'.$level;
        }
        else
        {
            $ilvl = '';
        }

        if(file_exists('images/items/'.$iexc.$type.'-'.$id.$ilvl.'.gif'))
        {
            $output = '/images/items/'.$iexc.$type.'-'.$id.$ilvl.'.gif';
        }
        elseif(file_exists('images/items/'.$type.'-'.$id.'.gif'))
        {
            $output = '/images/items/'.$type.'-'.$id.'.gif';
        }
        else
        {
            $output = '/images/items/no.png';
        }

        return $output;
    }
}