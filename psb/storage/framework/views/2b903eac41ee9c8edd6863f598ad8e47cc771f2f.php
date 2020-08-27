<div class="col-6 offset-3 mt-3">
	<div class="card border-secondary">
		<div class="card-header">
			<h4><?php echo e($calon->name); ?></h4>
		</div>
		<div class="card-body bg-secondary">
			Berdasarkan keputusan panitia PPDB SIT Nurul Fikri dinyatakan:
			<h2 class="mt-3 text-white"> <?php echo e($arrayhasil[$hasils->lulus]); ?> </h2>
			<hr>
			<p><?php echo e($hasils->catatan); ?></p>
			<hr>
			<a href="psb" class="btn btn-primary">Rincian Pembiayaan</a>
		</div>
	</div>
</div>
<?php /**PATH /home/tik/psb/resources/views/front/hasiltes.blade.php ENDPATH**/ ?>