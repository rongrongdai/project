<?php
return array(
        //项目分组设置
	 'APP_GROUP_LIST' => 'User,Common,Communicate,Find,User,XueBa',
         //默认分组设置
         'DEFAULT_GROUP'  => 'User',
         'NO_LOGIN'=>array(
               'User'=>array('regist','login','thirdLogin','chPassword','getCode','getAroundPerson','getVcode'),
                'Purse'=>array(),
                'Order'=>array(),//初inclass外都不需要
                'Course'=>array('getCourse','getLastCourse','getRecommend','getDcourse','getDcourse','getGcourse'),
                'Exam'=>array('getPapers','getPaper','getQuestion','hotPapers'),//所有写法
                'Question'=>array('getHotQes','getQesByCid','getAnswer','getPperson'),
                'Teach'=>array('getTeachs','getIteachs','getAroundTeach'),
                'Collection'=>array(),
                'DynamicAction'=>array(),
                'Friend'=>array('getPerson'),
                'Group'=>array('getGroup','getAroundGroup')
        ),
   
);
?>