<h1>show</h1>



<?php
//debug($cats);
use \app\components\MyWidget;
?>
<h1> <?// echo count($cats[0]->products);?> </h1>
<?//debug($cats);
//    foreach ($cats as $cat) {
//        echo $cat->title . '<br>';
//    }
    ?>
<?php

//    foreach ($cats as $cat) {
//        echo '<ul>';
//            echo '<li>' . $cat->title . '</li>';
//            $products = $cat->products;
//            foreach ($products as $product) {
//                echo '<ul>';
//                    echo '<li>' . $product->title. '</li>';
//                echo '</ul>';
//            }
//        echo '</ul>';
//    }
?>
<?php echo MyWidget::widget(['name' => 'Азиз'])?>

<?php //MyWidget::begin();?>
<!--    <h1>Hello!</h1>-->
<?php //MyWidget::end();?>

<button class="btn btn-success">Click</button>
<?php $this->registerJsFile('@web/js/scripts.js', ['depends' => 'yii\web\YiiAsset']);?>
<?php $this->registerJs("$('.container').append('<p>Show</p>!');");

$this->beginBlock('title');?>
<h1>заголовок</h1><?php
$this->endBlock();


$js = <<<JS
    $('.btn').on('click', function() {
      $.ajax({
        url: 'index.php?r=post/index',
        data: {test: '123'},
        success: function(res) {
          console.log(res);
        },
        error: function() {
          alert('err');
        }
      })
    })
JS;
$this->registerJs($js);
