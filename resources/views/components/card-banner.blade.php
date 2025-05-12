<div class="col-12">
    <div class="card shadow profile-card">
        <div class="profile-header">
            <span class="badge fs-6 bg-success status-badge">
                <i class="bi bi-person-check-fill"></i> {{ Auth::user()->status_keanggotaan ? 'Aktif' : 'Non Aktif' }}
            </span>
            <img src="{{ asset(Auth::user()->foto) }}" alt="Foto Profil" class="profile-img">
        </div>
        <div class="profile-content d-flex flex-column">
            <p class="fw-bold mb-0">{{ Auth::user()->name }}</p>
            <p class="fw-bold mb-0">{{ Auth::user()->no_kta }}</p>
            <p class="text-muted mb-0">Tercatat sejak {{ Auth::user()->created_at }}</p>
        </div>
    </div>
</div>
