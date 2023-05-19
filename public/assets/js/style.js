const mode = {
    dark: 'Dark Mode',
    light: 'Light Mode',
  };
  
  const checkbox = document.getElementById('checkbox');
  
  const theme = localStorage.getItem('theme');
  document.body.classList.add(theme || null);
  checkbox.checked = theme !== 'dark';
  
  document.getElementById('label-mode').innerText = mode[theme || 'light'];
  
  checkbox.addEventListener('change', () => {
    document.body.classList.toggle('dark');
  
    const theme = localStorage.getItem('theme');
    checkbox.checked = theme === 'dark';
  
    if (theme === 'dark') {
      localStorage.setItem('theme', '');
      document.getElementById('label-mode').innerText = mode.light;
    } else {
      localStorage.setItem('theme', 'dark');
      document.getElementById('label-mode').innerText = mode.dark;
    }
  });