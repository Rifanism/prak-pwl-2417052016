<footer class="site-footer">
    <div class="container-page">
        <div class="site-footer__grid">
            <div>
                <span class="navbar__wordmark">
                    <span class="navbar__name">{{ config('institution.name') }}</span>
                    <span class="navbar__unit">{{ config('institution.unit') }}</span>
                </span>

                <p class="site-footer__about">
                    {{ config('institution.program') }}
                </p>
            </div>

            <div>
                <h2 class="site-footer__heading">Akademik</h2>
                <ul class="site-footer__list">
                    <li><a href="{{ route('user.index') }}">Data Mahasiswa</a></li>
                    <li><a href="{{ route('user.create') }}">Tambah Mahasiswa</a></li>
                </ul>
            </div>

            <div>
                <h2 class="site-footer__heading">Institusi</h2>
                <ul class="site-footer__list">
                    <li><a href="https://{{ config('institution.domain') }}" rel="noopener noreferrer" target="_blank">Situs Universitas</a></li>
                    <li><a href="mailto:{{ config('institution.email') }}">Email Fakultas</a></li>
                </ul>
            </div>

            <div>
                <h2 class="site-footer__heading">Kontak</h2>
                <ul class="site-footer__list">
                    <li>
                        <span class="text-sm text-ink-soft">{{ config('institution.address') }}</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="site-footer__bottom">
            <span>&copy; {{ now()->year }} {{ config('institution.name') }}</span>
            <span>{{ config('institution.academic_period') }}</span>
        </div>
    </div>
</footer>
