function tampilkanPengurus() {
    const ranting = document.getElementById('ranting').value;
    const box = document.getElementById('pengurus-box');

    const dataPengurus = {
        Bakauheni: {
          ketua: { nama: '', foto: 'assets/images/bakauheni_ketua.png' },
          sekretaris: { nama: '', foto: 'assets/images/bakauheni_sekretaris.png' },
          bendahara: { nama: '', foto: 'assets/images/bakauheni_bendahara.png' }
        },
        "Branti_Raya": {
          ketua: { nama: '', foto: 'assets/images/branti_raya_ketua.png' },
          sekretaris: { nama: '', foto: 'assets/images/branti_raya_sekretaris.png' },
          bendahara: { nama: '', foto: 'assets/images/branti_raya_bendahara.png' }
        },
        "Bumi_Daya": {
          ketua: { nama: '', foto: 'assets/images/bumi_daya_ketua.png' },
          sekretaris: { nama: '', foto: 'assets/images/bumi_daya_sekretaris.png' },
          bendahara: { nama: '', foto: 'assets/images/bumi_daya_bendahara.png' }
        },
        Candipuro: {
          ketua: { nama: '', foto: 'assets/images/candipuro_ketua.png' },
          sekretaris: { nama: '', foto: 'assets/images/candipuro_sekretaris.png' },
          bendahara: { nama: '', foto: 'assets/images/candipuro_bendahara.png' }
        },
        Hajimena: {
          ketua: { nama: '', foto: 'assets/images/hajimena_ketua.png' },
          sekretaris: { nama: '', foto: 'assets/images/hajimena_sekretaris.png' },
          bendahara: { nama: '', foto: 'assets/images/hajimena_bendahara.png' }
        },
        "Jati_Agung": {
          ketua: { nama: '', foto: 'assets/images/jati_agung_ketua.png' },
          sekretaris: { nama: '', foto: 'assets/images/jati_agung_sekretaris.png' },
          bendahara: { nama: '', foto: 'assets/images/jati_agung_bendahara.png' }
        },
        Kalianda: {
          ketua: { nama: '', foto: 'assets/images/kalianda_ketua.png' },
          sekretaris: { nama: '', foto: 'assets/images/kalianda_sekretaris.png' },
          bendahara: { nama: '', foto: 'assets/images/kalianda_bendahara.png' }
        },
        Kaliasin: {
          ketua: { nama: '', foto: 'assets/images/kaliasin_ketua.png' },
          sekretaris: { nama: '', foto: 'assets/images/kaliasin_sekretaris.png' },
          bendahara: { nama: '', foto: 'assets/images/kaliasin_bendahara.png' }
        },
        "Karang_Anyar": {
          ketua: { nama: '', foto: 'assets/images/karang_anyar_ketua.png' },
          sekretaris: { nama: '', foto: 'assets/images/karang_anyar_sekretaris.png' },
          bendahara: { nama: '', foto: 'assets/images/karang_anyar_bendahara.png' }
        },
        Katibung: {
          ketua: { nama: '', foto: 'assets/images/katibung_ketua.png' },
          sekretaris: { nama: '', foto: 'assets/images/katibung_sekretaris.png' },
          bendahara: { nama: '', foto: 'assets/images/katibung_bendahara.png' }
        },
        Ketapang: {
          ketua: { nama: '', foto: 'assets/images/ketapang_ketua.png' },
          sekretaris: { nama: '', foto: 'assets/images/ketapang_sekretaris.png' },
          bendahara: { nama: '', foto: 'assets/images/ketapang_bendahara.png' }
        },
        "Merbau_Mataram": {
          ketua: { nama: '', foto: 'assets/images/merbau_mataram_ketua.png' },
          sekretaris: { nama: '', foto: 'assets/images/merbau_mataram_sekretaris.png' },
          bendahara: { nama: '', foto: 'assets/images/merbau_mataram_bendahara.png' }
        },
        Natar: {
          ketua: { nama: '', foto: 'assets/images/natar_ketua.png' },
          sekretaris: { nama: '', foto: 'assets/images/natar_sekretaris.png' },
          bendahara: { nama: '', foto: 'assets/images/natar_bendahara.png' }
        },
        Palas: {
          ketua: { nama: '', foto: 'assets/images/palas_ketua.png' },
          sekretaris: { nama: '', foto: 'assets/images/palas_sekretaris.png' },
          bendahara: { nama: '', foto: 'assets/images/palas_bendahara.png' }
        },
        Penengahan: {
          ketua: { nama: '', foto: 'assets/images/penengahan_ketua.png' },
          sekretaris: { nama: '', foto: 'assets/images/penengahan_sekretaris.png' },
          bendahara: { nama: '', foto: 'assets/images/penengahan_bendahara.png' }
        },
        Rajabasa: {
          ketua: { nama: '', foto: 'assets/images/rajabasa_ketua.png' },
          sekretaris: { nama: '', foto: 'assets/images/rajabasa_sekretaris.png' },
          bendahara: { nama: '', foto: 'assets/images/rajabasa_bendahara.png' }
        },
        "Rumah_Sakit": {
          ketua: { nama: '', foto: 'assets/images/rumah_sakit_ketua.png' },
          sekretaris: { nama: '', foto: 'assets/images/rumah_sakit_sekretaris.png' },
          bendahara: { nama: '', foto: 'assets/images/rumah_sakit_bendahara.png' }
        },
        Sidomulyo: {
          ketua: { nama: '', foto: 'assets/images/sidomulyo_ketua.png' },
          sekretaris: { nama: '', foto: 'assets/images/sidomulyo_sekretaris.png' },
          bendahara: { nama: '', foto: 'assets/images/sidomulyo_bendahara.png' }
        },
        Sragi: {
          ketua: { nama: '', foto: 'assets/images/sragi_ketua.png' },
          sekretaris: { nama: '', foto: 'assets/images/sragi_sekretaris.png' },
          bendahara: { nama: '', foto: 'assets/images/sragi_bendahara.png' }
        },
        Sukadamai: {
          ketua: { nama: '', foto: 'assets/images/sukadamai_ketua.png' },
          sekretaris: { nama: '', foto: 'assets/images/sukadamai_sekretaris.png' },
          bendahara: { nama: '', foto: 'assets/images/sukadamai_bendahara.png' }
        },
        "Talang_Jawa": {
          ketua: { nama: '', foto: 'assets/images/talang_jawa_ketua.png' },
          sekretaris: { nama: '', foto: 'assets/images/talang_jawa_sekretaris.png' },
          bendahara: { nama: '', foto: 'assets/images/talang_jawa_bendahara.png' }
        },
        "Tanjung_Agung": {
          ketua: { nama: '', foto: 'assets/images/tanjung_agung_ketua.png' },
          sekretaris: { nama: '', foto: 'assets/images/tanjung_agung_sekretaris.png' },
          bendahara: { nama: '', foto: 'assets/images/tanjung_agung_bendahara.png' }
        },
        "Tanjung_Bintang": {
          ketua: { nama: '', foto: 'assets/images/tanjung_bintang_ketua.png' },
          sekretaris: { nama: '', foto: 'assets/images/tanjung_bintang_sekretaris.png' },
          bendahara: { nama: '', foto: 'assets/images/tanjung_bintang_bendahara.png' }
        },
        "Tanjung_Sari_Ntr": {
          ketua: { nama: '', foto: 'assets/images/tanjung_sari_ntr_ketua.png' },
          sekretaris: { nama: '', foto: 'assets/images/tanjung_sari_ntr_sekretaris.png' },
          bendahara: { nama: '', foto: 'assets/images/tanjung_sari_ntr_bendahara.png' }
        },
        Tanjungsari: {
          ketua: { nama: '', foto: 'assets/images/tanjungsari_ketua.png' },
          sekretaris: { nama: '', foto: 'assets/images/tanjungsari_sekretaris.png' },
          bendahara: { nama: '', foto: 'assets/images/tanjungsari_bendahara.png' }
        },
        "Way_Panji": {
          ketua: { nama: '', foto: 'assets/images/way_panji_ketua.png' },
          sekretaris: { nama: '', foto: 'assets/images/way_panji_sekretaris.png' },
          bendahara: { nama: '', foto: 'assets/images/way_panji_bendahara.png' }
        },
        "Way_Sulan": {
          ketua: { nama: '', foto: 'assets/images/way_sulan_ketua.png' },
          sekretaris: { nama: '', foto: 'assets/images/way_sulan_sekretaris.png' },
          bendahara: { nama: '', foto: 'assets/images/way_sulan_bendahara.png' }
        },
        "Way_Urang": {
          ketua: { nama: 'Nyimas Evi Syafitri Mayasari, S.Tr.Keb., Bdn.', foto: 'assets/images/way_urang_ketua.png' },
          sekretaris: { nama: 'Bdn. Juni Ekawati, S.Tr.Keb.', foto: 'assets/images/way_urang_sekretaris.png' },
          bendahara: { nama: 'Sy. Lubna, A.Md.Keb', foto: 'assets/images/way_urang_bendahara.png' }
        }
      };
      
    
    
    // const dataPengurus = {
    //     Way_Urang: {
    //         ketua: { nama: 'NYIMAS EVI SYAFITRI MAYASARI, S.Tr.Keb., Bdn.', foto: 'assets/images/way_urang_ketua.png' },
    //         sekretaris: { nama: 'Bdn. JUNI EKAWATI, S.Tr.Keb', foto: 'assets/images/way_urang_sekretaris.png' },
    //         bendahara: { nama: 'Ny. Rina Kusuma', foto: 'assets/images/way_urang_bendahara.png' }
    //     },
    //     kalianda: {
    //         ketua: { nama: 'Ny. Lina Marlina', foto: 'assets/images/kalianda_ketua.png' },
    //         sekretaris: { nama: 'Ny. Sari Putri', foto: 'assets/images/kalianda_sekretaris.png' },
    //         bendahara: { nama: 'Ny. Ayu Setia', foto: 'assets/images/kalianda_bendahara.png' }
    //     },
    //     natar: {
    //         ketua: { nama: 'Ny. Erna Lestari', foto: 'assets/images/natar_ketua.png' },
    //         sekretaris: { nama: 'Ny. Winda Fitria', foto: 'assets/images/natar_sekretaris.png' },
    //         bendahara: { nama: 'Ny. Dwi Anjani', foto: 'assets/images/natar_bendahara.png' }
    //     }
    // };

    if (dataPengurus[ranting]) {
        const p = dataPengurus[ranting];
        box.innerHTML = `
            <div style="display: flex; flex-direction: column; gap: 1rem;">
                <!-- Ketua -->
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <img src="${p.ketua.foto}" style="width:80px; height:auto; border-radius: 8px;">    
                    <div style="min-width: 200px; text-align: left;">
                      <p style="margin: 0;"><strong>Ketua</strong><br>${p.ketua.nama}</p>
                    </div>
                </div>

                <!-- Sekretaris (gambar di kanan) -->
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <div style="min-width: 200px; text-align: right;">
                        <p style="margin: 0;"><strong>Sekretaris</strong><br>${p.sekretaris.nama}</p>
                    </div>
                    <img src="${p.sekretaris.foto}" style="width:80px; height:auto; border-radius: 8px;">
                </div>

                <!-- Bendahara -->
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <img src="${p.bendahara.foto}" style="width:80px; height:auto; border-radius: 8px;">
                    <div style="min-width: 200px; text-align: left;">
                        <p style="margin: 0;"><strong>Bendahara</strong><br>${p.bendahara.nama}</p>
                    </div>
                </div>
            </div>


        `;
    } else {
        box.innerHTML = `<p><em>Data pengurus belum tersedia untuk ranting ini.</em></p>`;
    }
}
