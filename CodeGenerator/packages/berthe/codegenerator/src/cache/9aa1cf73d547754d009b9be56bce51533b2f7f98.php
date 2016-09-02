<?php $__env->startSection('title'); ?><?php echo e(ucfirst($table['title'])); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?><form action="/<?php echo e($table['title']); ?>" method="post"><?php if( array_key_exists('attributs', $table) ): ?><?php $__currentLoopData = $table['attributs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attrName => $attrType): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		<?php if(gettype($attrType) == gettype('')): ?>

				<div class="form-group">
					<label id="<?php echo e($attrName); ?>"><?php echo e(ucfirst($attrName)); ?></label>
					<input type="text" name="<?php echo e($attrName); ?>" class="form-group" placeholder="<?php echo e($attrName); ?>"/>
				</div>
		<?php endif; ?>
					
		<?php if(gettype($attrType) == gettype(0)): ?>    	<div class="form-group">
						<label id="<?php echo e($attrName); ?>"><?php echo e(ucfirst($attrName)); ?></label>
						<input type="number" name="<?php echo e($attrName); ?>" class="form-group" placeholder="<?php echo e($attrName); ?>"/>
				</div>
			<?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> <?php endif; ?>
	
	<?php if(array_key_exists('relations', $table)): ?><?php $__currentLoopData = $table['relations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relationType => $tab): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?><?php if($relationType == "hasMany"): ?>
			<div class="form-group">
				<label id="<?php echo e($tab[0]); ?>"><?php echo e(ucfirst($tab[0])); ?></label>
				<select name="<?php echo e($tab[0]); ?>select" class="form-group"></select>
			</div>
	<?php elseif($relationType == "belongsTo"): ?>
			<div class="form-group">
					<label id="<?php echo e($tab[0]); ?>"><?php echo e(ucfirst($tab[0])); ?></label>
					<select name="<?php echo e($tab[0]); ?>select" class="form-group"></select>
				</div>
	<?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> <?php endif; ?>
	
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Soumettre</button>
					<button type="reset" class="btn btn-primary">Annuler</button>
				</div>
	</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('formMaster', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>