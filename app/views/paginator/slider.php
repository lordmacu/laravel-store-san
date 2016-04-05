<?php
	$presenter = new Illuminate\Pagination\BootstrapPresenter($paginator);
?>

<div class="">
	<ul class="pull-left ">
		<li>
		Mostrando
		<?php echo $paginator->getFrom(); ?>
		-
		<?php echo $paginator->getTo(); ?>
		de
		<?php echo $paginator->getTotal(); ?>
		items
		</li>
	</ul>

	<ul class="pull-right pagination">
		<?php echo $presenter->render(); ?>
	</ul>
</div>
