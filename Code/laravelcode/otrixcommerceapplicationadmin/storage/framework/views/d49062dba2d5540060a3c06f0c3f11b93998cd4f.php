<?php $__env->startSection('content'); ?>

    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-black d-inline-block">Banner</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="<?php echo e(route('banner')); ?>">Banner</a></li>
                                <li class="breadcrumb-item">List</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="<?php echo e(route('banner.add')); ?>" class="btn btn-lg btn-neutral fade-class"><i class="fas fa-plus fa-lg"></i> New</a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter -->
  <div class="container-fluid mt--6 mb--1">
      <div class="row">
          <div class="col">
              <div class="card">
                <div class="card-header border-0">
                    <h3 class="mb-3">Filter</h3>
                    <form action="<?php echo e(route('banner')); ?>">
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <input type="text" name="name" id="name" value="<?php echo e(request()->name); ?>" class="form-control form-control-alternative" placeholder="Search..." autofocus>
                            </div>
                            <div class="col-md-3 form-group">
                                <button type="submit" class="btn btn-success"><i class="fas fa-search"></i></button>
                                <a href="<?php echo e(route('banner')); ?>" class="btn btn-info"><i class="fas fa-sync-alt"></i></a>
                            </div>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>

    <!-- Page content -->
    <div class="container-fluid ">
        <div class="row">
            <div class="col">
                <div class="card">

                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">Name</th>
                                <th scope="col" class="sort" data-sort="status">Status</th>
                                <th scope="col" class="sort">Action</th>
                            </tr>
                            </thead>
                            <tbody class="list">

                            <?php $__empty_1 = true; $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                                <tr>
                                    <td class="budget"><?php echo e($value->name); ?></td>
                                    <td class="budget"><span class="p-2  <?php if($value->status == 1): ?> badge bg-success text-white  <?php else: ?>  badge bg-danger text-white <?php endif; ?>"><?php echo e(config('constant.status')[$value->status]); ?> </span></td>

                                    <td class="">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="<?php echo e(route('banner.edit',['id' => $value->id])); ?>">Edit</a>
                                                <!-- <a class="dropdown-item deleteData" type="button"  href="javascript:void(0)" data-url="<?php echo e(route('banner.delete',['id' => $value->id])); ?>">Delete</a> -->
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="10" class="budget">
                                        No Record Found
                                    </td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Card footer -->
                    <div class="card-footer py-4">
                        <?php echo e($records->appends(['name' => request()->name])->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>

    <script>
        $(document).on('click','.deleteData',function(){
            let alertMessage = "Are You Sure,You want to delete it ?"
            let routeUrl = $(this).data('url')
            deleteData(alertMessage, routeUrl)
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u554892978/domains/otrixcommerce.in/public_html/development/resources/views/admin/banner/index.blade.php ENDPATH**/ ?>