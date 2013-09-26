<!--открывается заголовок. Первая часть кода PHP заголовка предназначена для того, чтобы убедиться, что к файлу не обращаются напрямую, из соображений безопасности. -->
<?php
defined('_JEXEC') or die;
JHtml::_('behavior.framework', true);
$app = JFactory::getApplication();
?>
<?php echo '<?'; ?>xml version="1.0" encoding="<?php echo $this->_charset ?>"?>

<!--DOCTYPE – это очень важный параметр, на основании которого браузер решает, как ему отображать эту страницу и как интерпретировать CSS. -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<!--Следующий фрагмент извлекает установленный язык из глобальной конфигурации-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
	
<!--Далее идет  фрагмент кода, который включает дополнительную информацию для заголовка, которая задана в глобальной конфигурации. Эту информацию вы можете увидеть посмотрев исходный код любой веб-страницы. В частности – это мета-теги, о которых вы уже знаете.-->	
<head>
<jdoc:include type="head" />

<!--Следующие строки в заголовке содержат ссылки на основные CSS стили Joomla.-->
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/general.css" type="text/css" />

<!--Чтобы задействовать стили оформления шаблона, делаем ссылку на файл, содержащий каскадные таблицы стилей template.css, который лежит в папке CSS -->
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/template.css" type="text/css" />

<!--Следующий фрагмент кода позволяет нам сворачивать левую или правую колонки, если в позициях «left» и « right» не расположено ни одного модуля. В случае если свернуты обе колонки, то контент занимает  100% ширины страницы.  Если включена только одна колонка, то контент занимает 80%. При двух включенных колонках на контент приходится 60% ширины страницы.-->
<?php 
if($this->countModules('left and right') == 0) $contentwidth = "100";
if($this->countModules('left or right') == 1) $contentwidth = "80";
if($this->countModules('left and right') == 1) $contentwidth = "60";
?>

</head><!--Заголовок закрывается-->
	
	<!--Далее тегом <body> открывается громадный блок оформления веб-страницы  вместе с задним, он растягивается на всю ширину окна браузера. -->
	<body>
	
<!--Блок «page» содержит  оформление только страницы сайта, именно она и будет шириной 1050рх.-->
<div id="page">

<!--блок поиска по сайту и верхней навигации "хлебные крошки"--> 
 <div id="top">
 
<!-- В боке «logo» мы разместим графический файл логотипа, это будет прописано в таблицах стилей. А вот автоматический вывод названия сайта прописываем в файле  index.php, причем название помещаем в тег H1, что очень важно для поисковой оптимизации. -->
<div id="logo">
<h1><?php echo $app->getCfg('sitename'); ?></h1>
</div>

<!--Определим позицию «user1» для вывода модуля поиска по сайту. -->
<div id="user1">
<jdoc:include type="modules" name="user1" style="xhtml" />
</div> 
</div><!-- конец блока top --> 

	<!--Вывод модуля горизонтального меню в блоке «user2» в позиции «user2». Блок будет сворачиваться, если в этой позиции не будет модуля.-->
	  <?php if($this->countModules('user2')) : ?>
 <div id="user2 ">
	   <jdoc:include type="modules" name="user2" style="xhtml" /> 
	  	  </div> 
     	  <?php endif; ?>	 
			  
<!--Дальше идет блок шапки сайта «header». В нем мы определим позицию «header»    для вывода модулей. Блок будет сворачиваться, если в этой позиции не будет модуля. Я намеренно расширила возможности этого блока, чтобы иметь возможность разместить в нем не только картинку шапки, но и ротаторы изображений. -->
<?php if($this->countModules('header')) : ?>
 <div id="header ">
	   <jdoc:include type="modules" name="header" style="xhtml" /> 
	  	  </div> 
     	  <?php endif; ?>	


<!--В блоке «user3» определим позицию «user3»  для вывода модулей представления контента. Я планирую использовать замечательный модуль News Show Pro GK4, это один  из лучших инструментов для представления анонсов статей в Joomla.  Огромное количество вариантов и возможностей форматирования - это то, что делает News Show Pro GK4 сложным инструментом повышения привлекательности содержания страниц.  Блок будет сворачиваться, если в этой позиции «user3» не будет выводится модуль. -->
	<?php if($this->countModules('user3')) : ?>
	      <div id="user3">
	    <jdoc:include type="modules" name="user3" style="xhtml" />
	   </div> 
      <?php endif; ?> 
		
	
 <!-- Открывается блок левой колонки, которая будет сворачиваться, если в позиции «left» не будет ни одного модуля.  -->
	        <?php if($this->countModules('left')) : ?>
      <div id="left">
           <jdoc:include type="modules" name="left" style="xhtml" />
      </div>
      <?php endif; ?>
     
<!--Открывается самый важный блок контента, который может занимать 100% ширины страницы,  80% и 60%, в зависимости от количества включенных колонок.  -->
	 <div id="content<?php echo $contentwidth; ?>">
	  
<!--Вывод сообщений в компонентах--> 
  <jdoc:include type="message" /> 
  
  <!--Вывод содержимого контента.   --> 
      <jdoc:include type="component" style="xhtml" />
  </div> <!--конец блока контента-->
 
                    
<!--Открывается блок правой колонки, которая будет сворачиваться, если в позиции «rigth» не будет ни одного модуля.  -->
<?php if($this->countModules('right')) : ?>
<div id="rigth">
<jdoc:include type="modules" name="right" style="xhtml" />
</div>
<?php endif; ?>	
	       
<!--Вывод блока «footer», предназначенного для вывода модуля «HTML код» с информацией  об авторских правах. Можно также разместить здесь нижнее горизонтальное меню или модуль представления контента News Show Pro GK4 . Блок будет сворачиваться, если в этой позиции «footer» не будет выводится не один модуль -->
<?php if($this->countModules('footer')) : ?>
<div id="footer">
<jdoc:include type="modules" name="footer" style="xhtml" />
</div>
<?php endif; ?>	

</div><!--конец блока page-->
</body><!--конец блока body -->
</html><!--конец кода-->
