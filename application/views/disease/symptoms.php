<div id="grid_padding" class="grid_11">

	<?php
	if ($this->session->flashdata('message') != '') {
		echo '<div class="success_message">' . $this->session->flashdata('message') . '</div>';
	} ?>

	<div class="table_list">

		<?php if (!empty($symptoms)) { ?>

			<table class="table" cellspacing="0" cellpadding="0">
				<tr>
					<th><?php echo $this->lang->line("label_symptom_name"); ?></th>
					<th><?php echo $this->lang->line("label_date_created"); ?></th>
					<th><?php echo $this->lang->line("label_action"); ?></th>
				</tr>

				<?php
				$serial = 1;
				foreach ($symptoms as $specie) { ?>
					<tr>
						<td><?php echo $specie->name; ?></td>
						<td><?php echo date('d-m-Y H:i:s', strtotime($specie->date_created)); ?></td>
						<td>
							<?php echo anchor("disease/edit_disease/" . $specie->id, "Edit"); ?>
							<?php echo anchor("disease/delete_disease/" . $specie->id, "Delete", "class='delete'"); ?>
						</td>
					</tr>
					<?php $serial++;
				} ?>
			</table>

		<?php } else { ?>
			<div class="fail_message">No symptom has been added</div>
		<?php } ?>
	</div>
</div>
