<div style="padding: 100px 0px;">
	<div class="container">
		<div class="row">
			<div class="d-flex justify-content-center">
				<h3>__ToDo List__</h3>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-12" id="list_body">
				<?php
					$this->load->view('to_do_list/to_do_list_body');
				?>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-12" id="to_do_form">
				<?php 
					$this->load->view('to_do_list/create_task');
				?>
			</div>
		</div>
	</div>
</div>