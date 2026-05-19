@extends('app')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    
    <div class="lg:col-span-1">
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 lg:sticky lg:top-24">
            <div class="mb-5">
                <h2 class="text-lg font-bold text-slate-900">Mulai Aksi Sosial</h2>
                <p class="text-xs text-slate-500 mt-1">Galang dukungan dan buat perubahan nyata di sekitarmu.</p>
            </div>
            
            @if(session('success'))
                <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 p-4 rounded-xl mb-5 text-sm flex items-start space-x-2 animate-pulse">
                    <span>✅</span>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <form action="{{ route('campaign.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-2">Judul Gerakan</label>
                    <input type="text" name="title" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 text-sm transition-all placeholder:text-slate-400" placeholder="Contoh: Berbagi Sarapan untuk Lansia" required>
                </div>
                
                <div>
                    <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-2">Target Dana (Rp)</label>
                    <div class="relative">
                        <span class="absolute left-4 top-3 text-sm font-semibold text-slate-400">Rp</span>
                        <input type="number" name="target_amount" class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 text-sm transition-all" placeholder="5000000" required>
                    </div>
                </div>
                
                <div>
                    <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-2">Cerita/Deskripsi</label>
                    <textarea name="description" rows="4" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 text-sm transition-all placeholder:text-slate-400" placeholder="Gambarkan situasi lapangan dan alasan mengapa gerakan ini penting..." required></textarea>
                </div>
                
                <button type="submit" class="w-full bg-slate-900 hover:bg-slate-800 text-white font-semibold py-3 px-4 rounded-xl transition duration-200 shadow-sm text-sm">
                    🚀 Publikasikan Sekarang
                </button>
            </form>
        </div>
    </div>

    <div class="lg:col-span-2">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-slate-900">Campaign Aktif</h2>
            <span class="text-xs bg-slate-200 text-slate-700 px-2.5 py-1 rounded-full font-medium">
                {{ $campaigns->count() }} Total
            </span>
        </div>
        
        @if($campaigns->isEmpty())
            <div class="bg-white border border-dashed border-slate-200 p-12 rounded-2xl text-center shadow-sm">
                <span class="text-4xl block mb-3">📦</span>
                <h3 class="text-slate-700 font-semibold">Belum ada gerakan sosial</h3>
                <p class="text-slate-400 text-xs mt-1">Jadilah yang pertama membuat aksi kebaikan hari ini.</p>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($campaigns as $cp)
                <div class="bg-white rounded-2xl shadow-sm border border-slate-100 flex flex-col justify-between overflow-hidden hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">
                    
                    <div class="p-6">
                        <span class="inline-block bg-teal-50 text-teal-700 text-[10px] font-bold uppercase tracking-wider px-2 py-1 rounded-md mb-3">
                            Social Action
                        </span>
                        
                        <h3 class="text-base font-bold text-slate-900 line-clamp-1 hover:text-emerald-600 transition-colors">
                            {{ $cp->title }}
                        </h3>
                        
                        <p class="text-slate-500 text-xs mt-2 line-clamp-3 leading-relaxed">
                            {{ $cp->description }}
                        </p>
                        
                        <div class="mt-5 pt-4 border-t border-slate-50">
                            <div class="flex justify-between text-xs font-semibold mb-1">
                                <span class="text-emerald-600">Rp 0 terkumpul</span>
                                <span class="text-slate-400">Target: Rp{{ number_format($cp->target_amount, 0, ',', '.') }}</span>
                            </div>
                            <div class="w-full bg-slate-100 rounded-full h-1.5">
                                <div class="bg-emerald-500 h-1.5 rounded-full" style="width: 5%"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="px-6 py-4 bg-slate-50/70 border-t border-slate-100 flex justify-end space-x-2">
                        <a href="{{ route('campaign.edit', $cp->id) }}" class="inline-flex items-center space-x-1 bg-white hover:bg-slate-100 border border-slate-200 text-slate-700 text-xs font-medium py-1.5 px-3 rounded-lg transition">
                            <span>✏️</span> <span>Edit</span>
                        </a>
                        
                        <form action="{{ route('campaign.destroy', $cp->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus aksi sosial ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center space-x-1 bg-rose-50 hover:bg-rose-100 border border-rose-100 text-rose-600 text-xs font-medium py-1.5 px-3 rounded-lg transition">
                                <span>🗑️</span> <span>Hapus</span>
                            </button>
                        </form>
                    </div>

                </div>
            @endforeach
        </div>
    </div>

</div>
@endsection