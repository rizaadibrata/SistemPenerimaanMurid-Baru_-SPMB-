<section class="ppdb-hero">
  <div class="container">
    <div class="hero-content text-center">
      <h1 class="hero-title">Seleksi Penerimaan Murid Baru</h1>
      <h2 class="hero-subtitle">SMK BAKTI NUSANTARA 666</h2>
      <p class="hero-description">Tahun Pelajaran 2025/2026</p>
      
      <div class="hero-text mt-4">
        <p>Bergabunglah dengan SMK Bakti Nusantara 666, sekolah berorientasi teknologi dan karakter yang berkomitmen menyiapkan lulusan siap kerja, siap kuliah, serta siap menghadapi tantangan masa depan.</p>
      </div>

      <div class="stats-container mt-5">
        <div class="stat-item">
          <div class="stat-number">16+</div>
          <div class="stat-label">Tahun Dedikasi Pendidikan</div>
        </div>
        <div class="stat-item">
          <div class="stat-number">300+</div>
          <div class="stat-label">Lulusan Berprestasi</div>
        </div>
        <div class="stat-item">
          <div class="stat-number">A</div>
          <div class="stat-label">Akreditasi Sekolah Unggulan</div>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
.ppdb-hero {
  padding: 160px 0 80px;
  background: var(--surface-color);
  color: var(--default-color);
  text-align: center;
}

.hero-content {
  max-width: 900px;
  margin: 0 auto;
}

.hero-title {
  font-size: 3rem;
  font-weight: 700;
  margin-bottom: 15px;
  letter-spacing: 0.5px;
  font-family: var(--heading-font);
  color: var(--heading-color);
}

.hero-subtitle {
  font-size: 2rem;
  font-weight: 600;
  margin-bottom: 10px;
  color: var(--accent-color);
  font-family: var(--heading-font);
}

.hero-description {
  font-size: 1.2rem;
  margin-bottom: 20px;
  color: color-mix(in srgb, var(--default-color), transparent 25%);
  font-weight: 300;
}

.hero-text p {
  font-size: 1.1rem;
  line-height: 1.8;
  color: color-mix(in srgb, var(--default-color), transparent 20%);
  font-weight: 300;
  max-width: 800px;
  margin: 0 auto;
}

.stats-container {
  display: flex;
  justify-content: center;
  gap: 40px;
  flex-wrap: wrap;
  margin-top: 50px;
}

.stat-item {
  flex: 1;
  min-width: 200px;
  padding: 30px;
  background: color-mix(in srgb, var(--accent-color), transparent 95%);
  border-radius: 15px;
  border: 1px solid color-mix(in srgb, var(--accent-color), transparent 90%);
  transition: all 0.3s ease;
}

.stat-item:hover {
  transform: translateY(-5px);
  background: color-mix(in srgb, var(--accent-color), transparent 90%);
  box-shadow: 0 10px 30px color-mix(in srgb, var(--accent-color), transparent 80%);
}

.stat-number {
  font-size: 2.5rem;
  font-weight: 700;
  margin-bottom: 10px;
  font-family: var(--heading-font);
  color: var(--accent-color);
}

.stat-label {
  font-size: 1rem;
  color: color-mix(in srgb, var(--default-color), transparent 30%);
  line-height: 1.5;
  font-weight: 300;
}

@media (max-width: 768px) {
  .ppdb-hero {
    padding: 140px 0 60px;
  }

  .hero-title {
    font-size: 2rem;
  }

  .hero-subtitle {
    font-size: 1.5rem;
  }

  .hero-description {
    font-size: 1rem;
  }

  .stats-container {
    gap: 20px;
  }

  .stat-item {
    min-width: 150px;
    padding: 20px;
  }

  .stat-number {
    font-size: 2rem;
  }

  .stat-label {
    font-size: 0.9rem;
  }
}
</style>
