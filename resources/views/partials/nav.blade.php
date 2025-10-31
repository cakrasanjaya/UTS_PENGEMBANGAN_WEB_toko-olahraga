<nav class="sidebar" id="sidebar">
  <!-- Toggle Button -->
  <button class="toggle-btn" onclick="toggleSidebar()">
    <i class="bi bi-chevron-left"></i>
  </button>

  <!-- Brand -->
  <a href="/" class="brand text-decoration-none">
    <span class="brand-icon">🏀</span>
    <span class="brand-text">Sans Store</span>
  </a>

  <!-- Navigation Menu -->
  <ul class="nav-menu">
    <li class="nav-item">
      <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}" data-tooltip="Dashboard">
        <i class="bi bi-house-door-fill nav-icon"></i>
        <span class="nav-text">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a href="/products" class="nav-link {{ request()->is('products*') ? 'active' : '' }}" data-tooltip="Produk">
        <i class="bi bi-bag-fill nav-icon"></i>
        <span class="nav-text">Produk</span>
      </a>
    </li>
    <li class="nav-item">
      <a href="/categories" class="nav-link {{ request()->is('categories*') ? 'active' : '' }}" data-tooltip="Kategori">
        <i class="bi bi-grid-fill nav-icon"></i>
        <span class="nav-text">Kategori</span>
      </a>
    </li>
    <li class="nav-item">
      <a href="/suppliers" class="nav-link {{ request()->is('suppliers*') ? 'active' : '' }}" data-tooltip="Distributor">
        <i class="bi bi-truck-front-fill nav-icon"></i>
        <span class="nav-text">Distributor</span>
      </a>
    </li>

    <!-- Menu Stock In -->
    <li class="nav-item">
      <a href="/stock-ins" class="nav-link {{ request()->is('stock-ins*') ? 'active' : '' }}" data-tooltip="Purchase">
        <i class="bi bi-box-arrow-in-down-left nav-icon"></i>
        <span class="nav-text">Purchase</span>
      </a>
    </li>

    <!--Menu Stock Out -->
    <li class="nav-item">
      <a href="/stock-outs" class="nav-link {{ request()->is('stock-outs*') ? 'active' : '' }}" data-tooltip="Sales">
        <i class="bi bi-box-arrow-up-right nav-icon"></i>
        <span class="nav-text">Sales</span>
      </a>
    </li>
  </ul>
</nav>

<!-- Mobile Toggle Button -->
<button class="mobile-toggle" onclick="toggleSidebarMobile()">
  <i class="bi bi-list"></i>
</button>


<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #f5f5f5;
    overflow-x: hidden;
  }

  /* Sidebar */
  .sidebar {
    position: fixed;
    top: 0;
    left: 0;
    height: 100vh;
    width: 280px;
    background: linear-gradient(180deg, #0f0f0f 0%, #1a1a1a 100%);
    padding: 2rem 1rem;
    box-shadow: 5px 0 20px rgba(0, 0, 0, 0.5);
    z-index: 1000;
    transition: all 0.3s ease;
    overflow-y: auto;
  }

  .sidebar.collapsed {
    width: 80px;
  }

  /* Brand */
  .brand {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 0.5rem 1rem;
    margin-bottom: 2rem;
    transition: all 0.3s ease;
    cursor: pointer;
  }

  .brand:hover {
    transform: scale(1.02);
  }

  .brand-icon {
    font-size: 2rem;
    animation: bounce 2s infinite;
    min-width: 40px;
    text-align: center;
  }

  @keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-5px); }
  }

  .brand-text {
    font-size: 1.2rem;
    font-weight: 700;
    letter-spacing: 0.5px;
    background: linear-gradient(90deg, #ffffff, #ffd700, #ffffff);
    background-size: 200% auto;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: shine 3s linear infinite;
    white-space: nowrap;
    overflow: hidden;
    transition: all 0.3s ease;
  }

  .sidebar.collapsed .brand-text {
    width: 0;
    opacity: 0;
  }

  @keyframes shine {
    to { background-position: 200% center; }
  }

  /* Toggle Button */
  .toggle-btn {
    position: absolute;
    top: 2rem;
    right: -15px;
    width: 30px;
    height: 30px;
    background: linear-gradient(135deg, #ffd700, #ffed4e);
    border: none;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 3px 10px rgba(255, 215, 0, 0.4);
    transition: all 0.3s ease;
    z-index: 1001;
  }

  .toggle-btn:hover {
    transform: scale(1.1);
    box-shadow: 0 5px 15px rgba(255, 215, 0, 0.6);
  }

  .toggle-btn i {
    color: #000;
    font-size: 1rem;
    transition: transform 0.3s ease;
  }

  .sidebar.collapsed .toggle-btn i {
    transform: rotate(180deg);
  }

  /* Navigation */
  .nav-menu {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  .nav-item {
    margin-bottom: 0.5rem;
  }

  .nav-link {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem 1.2rem;
    color: rgba(255, 255, 255, 0.85);
    text-decoration: none;
    border-radius: 12px;
    font-weight: 500;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
  }

  .nav-link::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.05);
    transition: left 0.3s ease;
    z-index: -1;
  }

  .nav-link:hover {
    color: #fff;
    transform: translateX(5px);
    background: rgba(255, 255, 255, 0.05);
  }

  .nav-link:hover::before {
    left: 0;
  }

  .nav-link.active {
    background: linear-gradient(135deg, #ffd700, #ffed4e);
    color: #000 !important;
    font-weight: 600;
    box-shadow: 0 5px 15px rgba(255, 215, 0, 0.4);
    transform: translateX(5px);
  }

  .nav-link.active::before {
    display: none;
  }

  .nav-icon {
    font-size: 1.3rem;
    min-width: 30px;
    text-align: center;
    transition: transform 0.3s ease;
  }

  .nav-link:hover .nav-icon {
    transform: rotate(15deg) scale(1.1);
  }

  .nav-link.active .nav-icon {
    transform: scale(1.2);
  }

  .nav-text {
    white-space: nowrap;
    transition: all 0.3s ease;
  }

  .sidebar.collapsed .nav-text {
    width: 0;
    opacity: 0;
    overflow: hidden;
  }

  .sidebar.collapsed .nav-link {
    justify-content: center;
    padding: 1rem;
  }

  /* Tooltip for collapsed state */
  .nav-link::after {
    content: attr(data-tooltip);
    position: absolute;
    left: 100%;
    top: 50%;
    transform: translateY(-50%);
    margin-left: 1rem;
    padding: 0.5rem 1rem;
    background: #000;
    color: #fff;
    border-radius: 8px;
    font-size: 0.9rem;
    white-space: nowrap;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.3s ease;
    z-index: 1002;
  }

  .sidebar.collapsed .nav-link:hover::after {
    opacity: 1;
  }

  .sidebar:not(.collapsed) .nav-link::after {
    display: none;
  }

  /* Scrollbar */
  .sidebar::-webkit-scrollbar {
    width: 6px;
  }

  .sidebar::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.05);
  }

  .sidebar::-webkit-scrollbar-thumb {
    background: rgba(255, 215, 0, 0.3);
    border-radius: 3px;
  }

  .sidebar::-webkit-scrollbar-thumb:hover {
    background: rgba(255, 215, 0, 0.5);
  }

  /* Mobile Toggle Button */
  .mobile-toggle {
    position: fixed;
    top: 1rem;
    left: 1rem;
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #ffd700, #ffed4e);
    border: none;
    border-radius: 12px;
    display: none;
    align-items: center;
    justify-content: center;
    box-shadow: 0 5px 15px rgba(255, 215, 0, 0.4);
    z-index: 999;
    cursor: pointer;
    transition: all 0.3s ease;
  }

  .mobile-toggle:hover {
    transform: scale(1.05);
    box-shadow: 0 7px 20px rgba(255, 215, 0, 0.6);
  }

  .mobile-toggle i {
    font-size: 1.5rem;
    color: #000;
  }

  /* Responsive */
  @media (max-width: 768px) {
    .sidebar {
      transform: translateX(-100%);
    }

    .sidebar.show {
      transform: translateX(0);
    }

    .toggle-btn {
      display: none;
    }

    .mobile-toggle {
      display: flex;
    }
  }
</style>

<script>
  // Initialize sidebar state from localStorage or default to collapsed
  document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const sidebarState = localStorage.getItem('sidebarState');
    
    // Set initial state (default collapsed)
    if (sidebarState === 'expanded') {
      sidebar.classList.remove('collapsed');
    } else {
      sidebar.classList.add('collapsed');
    }
  });

  function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('collapsed');
    
    // Save state to localStorage
    if (sidebar.classList.contains('collapsed')) {
      localStorage.setItem('sidebarState', 'collapsed');
    } else {
      localStorage.setItem('sidebarState', 'expanded');
    }
  }

  function toggleSidebarMobile() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('show');
  }

  // Close sidebar when clicking outside on mobile
  document.addEventListener('click', function(event) {
    if (window.innerWidth <= 768) {
      const sidebar = document.getElementById('sidebar');
      const mobileToggle = document.querySelector('.mobile-toggle');
      
      if (!sidebar.contains(event.target) && !mobileToggle.contains(event.target)) {
        sidebar.classList.remove('show');
      }
    }
  });

  // Auto-collapse sidebar after clicking a link (desktop & mobile)
  document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', function() {
      const sidebar = document.getElementById('sidebar');
      
      // Mobile: close sidebar
      if (window.innerWidth <= 768) {
        sidebar.classList.remove('show');
      } 
      // Desktop: auto-collapse sidebar after navigation
      else {
        sidebar.classList.add('collapsed');
        localStorage.setItem('sidebarState', 'collapsed');
      }
    });
  });
</script>

<!-- Bootstrap Icons (pastikan ini ada di <head> layout utama) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">