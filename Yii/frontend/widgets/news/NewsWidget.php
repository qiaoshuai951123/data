<?php
/**
 * Created by PhpStorm.
 * User: Joe Handsome
 * Date: 2017/9/29
 * Time: 11:44
 */
namespace frontend\widgets\news;
/**
 * 文章列表组件
 */
use frontend\models\NewsForm;
use Yii;
use yii\base\Widget;
use yii\data\Pagination;
use yii\helpers\Url;

class NewsWidget extends Widget
{
    //文章列表的标题
    public $title = '';

    //显示条数
    public $limit = 6;

    //是否显示更多
    public $more = true;

    //是否显示分页
    public $page = false;

    public function run()
    {
        $curPage = Yii::$app->request->get('page',1);
        //查询条件
        $cond = ['=','is_valid',0];
        $res = NewsForm::getList($cond,$curPage,$this->limit);
        $result['title'] = $this->title?:"最新文章";
        $result['more'] = Url::to(['news/index']);
        $result['body'] = $res['data']?:[];
        //是否显示分页
        if($this->page){
            $pages = new Pagination(['totalCount'=>$res['count'], 'pageSize' => $res['pageSize']]);
            $result['page'] = $pages;
        }
        return $this->render('index',['data'=>$result]);
    }
}