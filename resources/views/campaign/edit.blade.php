@extends('app')

@section('content')
<div class="max-w-xl mx-auto">
    
    <a href="{{ route('home') }}" class="inline-flex items-center space-x-2 text-sm text-slate-500 hover:text-slate-800 mb-4 transition">
        <span>←</span> <span>Kembali ke Dashboard</span>
    </a>

    <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100">
        <div class="mb-6">
            <h2 class="text-xl font-bold text-slate-900">Perbarui Detail Gerakan</h2>
            <p class="text-xs text-slate-500 mt-1">Sesuaikan informasi atau target dana agar penyaluran tepat sasaran.</p>
        </div>
        
        <form action="{{ route('campaign.update', $campaign->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')
            
            <div>
                <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-2">Nama Campaign</label>
                <input type="text" name="title" value="{{ $campaign->title }}" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 text-sm transition-all font-medium" required>
            </div>
            
            <div>
                <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-2">Target Dana (Rp)</label>
                <div class="relative">
                    <span class="absolute left-4 top-3 text-sm font-semibold text-slate-400">Rp</span>
                    <input type="number" name="target_amount" value="{{ $campaign->target_amount }}" class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 text-sm transition-all font-medium" required>
                </div>
            </div>
            
            <div>
                <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-2">Deskripsi Lengkap</label>
                <textarea name="description" rows="5" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 text-sm transition-all leading-relaxed" required>{{ $campaign->description }}</textarea>
            </div>
            
            <div class="flex items-center space-x-3 pt-2">
                <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-3 px-6 rounded-xl text-sm transition shadow-sm">
                    💾 Simpan Perubahan
                </button>
                <a href="{{ route('home') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold py-3 px-6 rounded-xl text-sm transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection