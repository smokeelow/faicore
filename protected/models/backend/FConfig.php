<?php
class FConfig extends CFormModel
{
    /**
     * server
     */
    public $serverIP;
    public $serverPort;
    public $serverCache;
    public $serverFOnline;

    /**
     * database
     */
    public $db_driver;
    public $db_host;
    public $db_name;
    public $db_user;
    public $db_password;
    public $reset_col;
    public $greset_col;
    public $md5;

    /**
     * themes
     */
    public $f_theme;
    public $b_theme;

    /**
     * seo
     */
    public $webURL;
    public $siteTitle;
    public $downTitle;
    public $chaRTitle;
    public $gulRTitle;
    public $regTitle;
    public $logTitle;
    public $serverName;
    public $metaDesc;
    public $metaKey;
    public $metaDescDown;
    public $metaKeyDown;
    public $metaDescChar;
    public $metaKeyChar;
    public $metaDescGuild;
    public $metaKeyGuild;
    public $metaDescReg;
    public $metaKeyReg;
    public $metaDescLog;
    public $metaKeyLog;
    public $serverCredits;

    /**
     * files
     */
    public $clientDown;
    public $clientDown_1;
    public $clientDown_2;
    public $clientDown_3;
    public $clientDown_4;
    public $clientDown_5;
    public $patchDown;
    public $launcherDown;

    /**
     * reset
     */
    public $resetLevel;
    public $resetPayType;
    public $resetPayDynamic;
    public $resetPayFixed;
    public $resetDwPoints;
    public $resetDkPoints;
    public $resetElfPoints;
    public $resetMgPoints;
    public $resetDlPoints;
    public $resetSumPoints;
    public $resetRfPoints;
    public $resetInvType;
    public $resetMlType;
    public $resetPtType;
    public $resetMax;


    /**
     * Cache
     */
    public $homePage;
    public $regPage;
    public $downPage;
    public $aboutPage;
    public $rankPage;
    public $homeTime;
    public $regTime;
    public $downTime;
    public $aboutTime;
    public $rankTime;


    /**
     * Voting
     */
    public $mmotopURL;
    public $voteURL;
    public $voteDefAward;
    public $voteSmsAward;


    /**
     * other
     */
    public $versionBit;
    public $email;
    public $mainPic;
    public $pk_price;
    public $pk_priceFix;
    public $res_price;
    public $res_priceFix;
    public $voteAw;
    public $pk_status;
    public $res_status;
    public $tp_price;
    public $tp_priceFix;
    public $tp_status;
    public $maxPoints;
    public $forumURL;

    /**
     * IPB connect
     */
    public $ipbServer;
    public $ipbDB;
    public $ipbUser;
    public $ipbPass;
    public $ipbTNumber;
    public $ipbCache;

    /**
     * CP Characters config
     */
    public $teleportationMItem;
    public $resetMItem;
    public $pointsMItem;

    /**
     * Rankings config
     */
    public $top_chars;
    public $showCharInfo;
    public $showAccChars;
    public $showMapCoord;

    /*
     * Payment Methods
     */
    public $ikID;
    public $ikSKey;
    public $ikRate;

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('email', 'email'),
            array(
                'versionBit,ikRate,homeTime,showCharInfo,showAccChars,showMapCoord,teleportationMItem,resetMItem,pointsMItem,regTime,downTime,aboutTime,
                rankTime,resetLevel,top_chars,pk_price,pk_priceFix,tp_price,tp_priceFix,
                res_price,res_priceFix,resetPayDynamic,resetPayFixed,resetDwPoints,resetDkPoints,
                resetElfPoints,resetMgPoints,resetDlPoints,resetRfPoints,resetMax,maxPoints,voteDefAward,
                voteSmsAward,serverFOnline,serverPort,serverFOnline,ipbCache', 'numerical'),
            array('clientDown,clientDown_1,clientDown_2,clientDown_3,clientDown_4,clientDown_5,patchDown,
            launcherDown,mmotopURL,voteURL,mainPic,forumURL', 'url')
        );
    }

    public function attributeLabels()
    {
        return array(
            'serverIP'          =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Server IP Address'),
            'serverPort'        =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Server port'),
            'serverCache'       =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Cache duration'),
            'serverFOnline'     =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'False online'),
            'db_driver'         =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Driver'),
            'db_host'           =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Server'),
            'db_name'           =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Database'),
            'db_user'           =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'User'),
            'db_password'       =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Password'),
            'md5'               =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'MD5 encryption'),
            'f_theme'           =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Frontend'),
            'b_theme'           =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Backend'),
            'siteTitle'         =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Title of web page'),
            'downTitle'         =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Title of web page'),
            'chaRTitle'         =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Title of web page'),
            'gulRTitle'         =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Title of web page'),
            'regTitle'          =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Title of web page'),
            'logTitle'          =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Title of web page'),
            'metaDesc'          =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Meta description'),
            'metaKey'           =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Meta keywords'),
            'metaDescReg'       =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Meta description'),
            'metaKeyReg'        =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Meta keywords'),
            'metaDescLog'       =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Meta description'),
            'metaKeyLog'        =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Meta keywords'),
            'metaDescDown'      =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Meta description'),
            'metaKeyDown'       =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Meta keywords'),
            'metaDescChar'      =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Meta description'),
            'metaKeyChar'       =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Meta keywords'),
            'metaDescGuild'     =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Meta description'),
            'metaKeyGuild'      =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Meta keywords'),
            'top_chars'         =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Number of characters in rank'),
            'serverName'        =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Server name'),
            'mainPic'           =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Main slide'),
            'clientDown'        =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Game client').' 1',
            'clientDown_1'      =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Game client').' 2',
            'clientDown_2'      =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Game client').' 3',
            'clientDown_3'      =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Game client').' 4',
            'clientDown_4'      =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Game client').' 5',
            'clientDown_5'      =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Game client').' 6',
            'patchDown'         =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Patch'),
            'launcherDown'      =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Launcher'),
            'reset_col'         =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Reset column'),
            'greset_col'        =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Grand reset column'),
            'webURL'            =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Base web site URL'),
            'serverCredits'     =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Server credits'),
            'pk_status'         =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Payment type'),
            'tp_status'         =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Payment type'),
            'res_status'        =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Payment type'),
            'pk_price'          =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Dynamic price'),
            'pk_priceFix'       =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Fixed price'),
            'tp_price'          =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Dynamic price'),
            'tp_priceFix'       =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Fixed price'),
            'res_price'         =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Dynamic price'),
            'res_priceFix'      =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Fixed price'),
            'resetPayType'      =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Payment type'),
            'resetPayDynamic'   =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Dynamic price'),
            'resetPayFixed'     =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Fixed price'),
            'resetDwPoints'     =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Dark Wizard points per reset'),
            'resetDkPoints'     =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Dark Knight points per reset'),
            'resetElfPoints'    =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Elf points per reset'),
            'resetMgPoints'     =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Magic Gladiator points per reset'),
            'resetDlPoints'     =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Dark Lord points per reset'),
            'resetSumPoints'    =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Summoner poins per reset'),
            'resetRfPoints'     =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Rage Fighter poins per reset'),
            'resetInvType'      =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Clean inventory'),
            'resetMlType'       =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Clean magic list'),
            'resetPtType'       =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Reset points'),
            'resetMax'          =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Maximum reset'),
            'homePage'          =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Home'),
            'regPage'           =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Registration'),
            'aboutPage'         =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'About us'),
            'downPage'          =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Download'),
            'rankPage'          =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Rankings'),
            'resetLevel'        =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Reset level'),
            'mmotopURL'         =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Mmotop link'),
            'voteURL'           =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'File with votes'),
            'voteDefAward'      =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Reward for simple vote'),
            'voteSmsAward'      =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Reward for SMS vote'),
            'email'             =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'E-mail'),
            'maxPoints'         =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Maximum points'),
            'forumURL'          =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Link to the forum'),
            'ipbServer'         =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'MySQL Server'),
            'ipbDB'             =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Database name'),
            'ipbUser'           =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'User'),
            'ipbPass'           =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Password'),
            'ipbTNumber'        =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Number of topics'),
            'ipbCache'          =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Caching time'),
            'teleportationMItem'=>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Teleportation'),
            'resetMItem'        =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Reset'),
            'pointsMItem'       =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Points'),
            'showCharInfo'      =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Character info'),
            'showAccChars'      =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Characters on account'),
            'showMapCoord'      =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Coordinates'),
            'versionBit'        =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Item size').'('.
                Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'bit').')',
            'ikID'              =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Shop ID'),
            'ikSKey'            =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Secret Key'),
            'ikRate'            =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Rate'),
        );
    }

    public function getFTempalte($param)
    {
        $skin = array_slice(scandir('skin/'.$param.''),2);

        $theme = array_slice(scandir('themes'),2);

        $entity = array_intersect ($skin, $theme);

        foreach($entity as $item)
        {
            $list[] = array($item=>$item);
        }

        return $list;
    }
}