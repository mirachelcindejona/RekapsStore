

<?php $__env->startSection('title', 'Kelola Kategori'); ?>

<?php $__env->startSection('page_title', 'Kelola Kategori Produk'); ?>

<?php $__env->startSection('page_breadcrumb', 'Kelola Kategori Produk'); ?>

<?php $__env->startSection('content'); ?>
    <?php if(session('success')): ?>
        <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded-lg font-medium shadow-sm">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    <?php if(session('error')): ?>
        <div class="mb-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 rounded-lg font-medium shadow-sm">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-[20px]">

        <div class="md:col-span-1 bg-white shadow-sm rounded-xl p-[20px] h-fit border border-neutral-200">
            <h3 class="font-bold text-[16px] mb-[15px]">Tambah Kategori Baru</h3>

            <form action="<?php echo e(url('/admin/categories')); ?>" method="POST" class="flex flex-col gap-3">
                <?php echo csrf_field(); ?>
                <div>
                    <label class="text-[13px] text-neutral-700">Nama Kategori</label>
                    <input type="text" name="name" required
                        class="mt-1 px-[12px] py-[10px] w-full rounded-[8px] border border-neutral-400 focus:border-[#7D39EB] outline-none"
                        placeholder="cth: Pakaian, Makanan">
                </div>
                <button type="submit"
                    class="bg-[#7D39EB] text-white py-[10px] rounded-[8px] font-bold hover:bg-[#5928a7]">Simpan
                    Kategori</button>
            </form>
        </div>

        <div class="md:col-span-2 bg-white shadow-sm rounded-xl p-[20px] border border-neutral-200">
            <h3 class="font-bold text-[16px] mb-[15px]">Daftar Kategori</h3>

            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-neutral-300">
                        <th class="py-3 px-2 text-[14px]">No</th>
                        <th class="py-3 px-2 text-[14px]">Nama Kategori</th>
                        <th class="py-3 px-2 text-[14px]">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="border-b border-neutral-200 hover:bg-neutral-50">
                            <td class="py-3 px-2 text-[14px]"><?php echo e($index + 1); ?></td>
                            <td class="py-3 px-2 text-[14px] font-semibold"><?php echo e($category->name); ?></td>
                            <td class="py-3 px-2">
                                <form action="<?php echo e(url('/admin/categories/' . $category->id)); ?>" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus kategori ini?');">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit"
                                        class="text-red-500 hover:text-red-700 text-[13px] font-bold">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\rekapsapp-byweebs\resources\views/admin/category.blade.php ENDPATH**/ ?>