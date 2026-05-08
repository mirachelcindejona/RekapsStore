@extends('admin.layouts.layout')

@section('content')
    <div class="page-header flex justify-between items-center mb-[24px]">
        <h2 class="text-[20px] font-bold text-[#0a0a0a]">Diskon & Voucher</h2>
        
        <div class="action-group flex gap-[10px] [@media(max-width:480px)]:flex-col">
            <button onclick="openDiskon()" class="btn btn-secondary px-[16px] py-[10px] rounded-[10px] text-[14px] font-medium bg-[#e5e5e5] text-[#333] hover:bg-[#d4d4d4] hover:-translate-y-[2px] transition-all duration-250 cursor-pointer [@media(max-width:480px)]:w-full">
                + Diskon Produk
            </button>
            
            <button onclick="openModal()" class="btn btn-primary px-[16px] py-[10px] rounded-[10px] text-[14px] font-medium bg-[linear-gradient(135deg,_#7d39eb,_#9761ef)] text-white [box-shadow:0_4px_10px_rgba(125,57,235,0.3)] hover:-translate-y-[2px] hover:[box-shadow:0_8px_20px_rgba(125,57,235,0.4)] transition-all duration-250 cursor-pointer [@media(max-width:480px)]:w-full">
                + Buat Voucher
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-[20px]">
        
        <div class="card bg-white p-[20px] rounded-[16px] [box-shadow:0_4px_20px_rgba(0,0,0,0.05)] border border-gray-100">
            <h3 class="mb-[14px] font-bold text-gray-900">Diskon aktif</h3>
            <div class="card-box discount flex justify-between items-center px-[26px] py-[22px] rounded-[12px] min-h-[120px] [box-shadow:0_8px_20px_rgba(0,0,0,0.12)] bg-[linear-gradient(135deg,_#7d39eb,_#a855f7)] text-white">
                <div class="card-left flex flex-col gap-[6px] text-left">
                    <h4 class="text-[14px] font-bold text-white/90 m-0">Diskon Bazar</h4>
                    <h2 class="text-[30px] font-extrabold leading-tight m-0">10% OFF</h2>
                    <p class="text-[12px] text-white/80 m-0">Berlaku sampai 25 April 2026</p>
                </div>
                <div class="card-action">
                    <button class="btn small px-[14px] py-[8px] rounded-[8px] text-[12px] font-semibold bg-white/20 text-white hover:bg-white/30 transition-all cursor-pointer" onclick="showConfirm('nonaktif-diskon')">
                        Nonaktifkan
                    </button>
                </div>
            </div>
        </div>

        <div class="card bg-white p-[20px] rounded-[16px] [box-shadow:0_4px_20px_rgba(0,0,0,0.05)] border border-gray-100">
            <h3 class="mb-[14px] font-bold text-gray-900">Voucher aktif</h3>
            <div class="card-box voucher flex justify-between items-center px-[26px] py-[22px] rounded-[12px] min-h-[120px] bg-transparent border-[2px] border-dashed border-[#7d39eb]">
                <div class="card-left flex flex-col gap-[4px] text-left">
                    <h3 class="text-[20px] font-extrabold text-[#7d39eb] m-0">EKRAF20</h3>
                    <p class="text-[13px] text-gray-600 font-medium m-0">Diskon Rp 20.000, Min. Rp100.000</p>
                    <span class="quota text-[11px] text-gray-400">Digunakan: 14/50 kuota</span>
                </div>
                <div class="card-action">
                    <button class="btn small outline px-[14px] py-[8px] rounded-[8px] text-[12px] font-semibold bg-purple-50 border border-[#7d39eb] text-[#7d39eb] hover:bg-[#7d39eb] hover:text-white transition-all cursor-pointer" onclick="showConfirm('nonaktif-voucher')">
                        Nonaktifkan
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <div id="overlay" class="overlay fixed inset-0 bg-black/40 backdrop-blur-sm hidden z-[40] [&.active]:block" onclick="closeAll()"></div>

    <div id="confirmPopup" class="confirm-popup fixed inset-0 flex items-center justify-center invisible opacity-0 transition-all duration-300 z-[2000] [&.active]:visible [&.active]:opacity-100">
        <div class="confirm-box bg-white p-[20px] rounded-[20px] w-[90%] max-w-[320px] text-center [box-shadow:0_10px_30px_rgba(0,0,0,0.2)]">
            <h3 id="confirmTitle" class="text-[16px] font-bold text-gray-900 mb-[8px]">Konfirmasi</h3>
            <p id="confirmText" class="text-[13px] text-gray-500 mb-[20px]">Apakah Anda yakin ingin melakukan tindakan ini?</p>
            <div class="confirm-action flex justify-center gap-[10px]">
                <button class="btn-cancel bg-gray-100 px-[16px] py-[8px] rounded-[10px] text-[13px] font-medium cursor-pointer" onclick="closeConfirm()">Tidak</button>
                <button class="btn-confirm bg-[#7d39eb] text-white px-[16px] py-[8px] rounded-[10px] text-[13px] font-medium cursor-pointer" onclick="confirmAction()">Ya</button>
            </div>
        </div>
    </div>

    <div id="modal" class="modal fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 scale-[0.9] bg-white w-[90%] max-w-[600px] rounded-[20px] p-[24px] max-h-[85vh] overflow-y-auto hidden z-[50] transition-all duration-250 ease-out shadow-2xl [&.active]:block [&.active]:scale-100">
        <div class="modal-header flex justify-between items-center mb-[20px]">
            <h2 class="text-[18px] font-bold text-gray-900">Buat Voucher Baru</h2>
            <span class="close cursor-pointer text-[20px] text-gray-400 hover:text-gray-600" onclick="closeAll()">✕</span>
        </div>
        <div class="modal-body">
            <div class="form-grid grid grid-cols-1 md:grid-cols-2 gap-[20px]">
                <div class="form-group flex flex-col gap-1.5">
                    <label class="text-[13px] font-medium text-gray-600">Kode Voucher</label>
                    <input type="text" placeholder="CTH : EKRAF20" class="p-[10px] rounded-[10px] border border-gray-200 outline-none focus:border-[#7d39eb] transition-all">
                </div>
                <div class="form-group flex flex-col gap-1.5">
                    <label class="text-[13px] font-medium text-gray-600">Tipe Voucher</label>
                    <select class="p-[10px] rounded-[10px] border border-gray-200 outline-none focus:border-[#7d39eb] bg-white">
                        <option>Nominal (Rp)</option>
                        <option>Persen (%)</option>
                    </select>
                </div>
                <div class="form-group flex flex-col gap-1.5">
                    <label class="text-[13px] font-medium text-gray-600">Nilai Diskon</label>
                    <input type="number" placeholder="0" class="p-[10px] rounded-[10px] border border-gray-200 outline-none focus:border-[#7d39eb]">
                </div>
                <div class="form-group flex flex-col gap-1.5">
                    <label class="text-[13px] font-medium text-gray-600">Min. Pembelian</label>
                    <input type="number" placeholder="Rp. 0" class="p-[10px] rounded-[10px] border border-gray-200 outline-none focus:border-[#7d39eb]">
                </div>
                <div class="form-group flex flex-col gap-1.5">
                    <label class="text-[13px] font-medium text-gray-600">Kuota Penggunaan</label>
                    <input type="number" placeholder="50" class="p-[10px] rounded-[10px] border border-gray-200 outline-none focus:border-[#7d39eb]">
                </div>
                <div class="form-group flex flex-col gap-1.5">
                    <label class="text-[13px] font-medium text-gray-600">Berlaku Hingga</label>
                    <input type="date" class="p-[10px] rounded-[10px] border border-gray-200 outline-none focus:border-[#7d39eb]">
                </div>
            </div>
        </div>
        <div class="modal-footer flex justify-end gap-[12px] mt-[24px] [@media(max-width:480px)]:flex-col">
            <button class="btn-cancel bg-gray-100 px-[20px] py-[10px] rounded-[12px] font-medium cursor-pointer" onclick="closeAll()">Batal</button>
            <button class="btn-save bg-[#c6ff33] text-gray-900 px-[20px] py-[10px] rounded-[12px] font-bold cursor-pointer" onclick="confirmSave()">Simpan</button>
        </div>
    </div>

    <div id="diskon" class="modal fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 scale-[0.9] bg-white w-[90%] max-w-[600px] rounded-[20px] p-[24px] max-h-[85vh] overflow-y-auto hidden z-[50] transition-all duration-250 ease-out shadow-2xl [&.active]:block [&.active]:scale-100">
        <div class="modal-header flex justify-between items-center mb-[20px]">
            <h2 class="text-[18px] font-bold text-gray-900">Tambah Diskon Produk</h2>
            <span class="close cursor-pointer text-[20px] text-gray-400 hover:text-gray-600" onclick="closeAll()">✕</span>
        </div>
        <div class="modal-body">
            <div class="form-grid grid grid-cols-1 md:grid-cols-2 gap-[20px]">
                <div class="form-group flex flex-col gap-1.5">
                    <label class="text-[13px] font-medium text-gray-600">Kategori Diskon</label>
                    <input type="text" placeholder="CTH : Diskon Bazar" class="p-[10px] rounded-[10px] border border-gray-200 outline-none focus:border-[#7d39eb]">
                </div>
                <div class="form-group flex flex-col gap-1.5">
                    <label class="text-[13px] font-medium text-gray-600">Tipe Diskon</label>
                    <select class="p-[10px] rounded-[10px] border border-gray-200 outline-none focus:border-[#7d39eb] bg-white">
                        <option>Nominal (Rp)</option>
                        <option>Persen (%)</option>
                    </select>
                </div>
                <div class="form-group flex flex-col gap-1.5">
                    <label class="text-[13px] font-medium text-gray-600">Nilai Diskon</label>
                    <input type="number" placeholder="0" class="p-[10px] rounded-[10px] border border-gray-200 outline-none focus:border-[#7d39eb]">
                </div>
                <div class="form-group flex flex-col gap-1.5">
                    <label class="text-[13px] font-medium text-gray-600">Min. Pembelian</label>
                    <input type="number" placeholder="Rp. 0" class="p-[10px] rounded-[10px] border border-gray-200 outline-none focus:border-[#7d39eb]">
                </div>
                <div class="form-group flex flex-col gap-1.5">
                    <label class="text-[13px] font-medium text-gray-600">Kuota Penggunaan</label>
                    <input type="number" placeholder="50" class="p-[10px] rounded-[10px] border border-gray-200 outline-none focus:border-[#7d39eb]">
                </div>
                <div class="form-group flex flex-col gap-1.5">
                    <label class="text-[13px] font-medium text-gray-600">Berlaku Hingga</label>
                    <input type="date" class="p-[10px] rounded-[10px] border border-gray-200 outline-none focus:border-[#7d39eb]">
                </div>
            </div>
        </div>
        <div class="modal-footer flex justify-end gap-[12px] mt-[24px] [@media(max-width:480px)]:flex-col">
            <button class="btn-cancel bg-gray-100 px-[20px] py-[10px] rounded-[12px] font-medium cursor-pointer" onclick="closeAll()">Batal</button>
            <button class="btn-save bg-[#c6ff33] text-gray-900 px-[20px] py-[10px] rounded-[12px] font-bold cursor-pointer" onclick="confirmSave()">Simpan</button>
        </div>
    </div>

    <script src="{{ asset('js/promo.js') }}"></script>
@endsection