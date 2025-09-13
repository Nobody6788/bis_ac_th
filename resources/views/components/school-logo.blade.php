<!-- This is a placeholder for the Boston International School logo -->
<!-- The actual logo image should be saved as boston-logo.png in the public/images directory -->
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 400" {{ $attributes->merge(['class' => 'w-16 h-16']) }}>
  <!-- Outer circle with school name -->
  <circle cx="200" cy="200" r="190" fill="none" stroke="#1e3a8a" stroke-width="4"/>
  
  <!-- School name text path -->
  <path id="textcircle" d="M 50,200 A 150,150 0 1,1 350,200 A 150,150 0 1,1 50,200" fill="none" stroke="none"/>
  <text font-family="Arial, sans-serif" font-size="24" font-weight="bold" fill="#1e3a8a">
    <textPath href="#textcircle" startOffset="0%">
      Boston International School
    </textPath>
  </text>
  
  <!-- Shield shape -->
  <path d="M200 80 L140 120 L140 200 C140 240 200 280 200 280 C200 280 260 240 260 200 L260 120 Z" 
        fill="#1e40af" stroke="#1e3a8a" stroke-width="3"/>
  
  <!-- Inner shield -->
  <path d="M200 100 L160 130 L160 190 C160 220 200 250 200 250 C200 250 240 220 240 190 L240 130 Z" 
        fill="#3b82f6" stroke="#1e40af" stroke-width="2"/>
  
  <!-- Globe/Cross icon in center -->
  <circle cx="200" cy="170" r="25" fill="#ffffff" stroke="#1e40af" stroke-width="2"/>
  <path d="M185 155 L215 155 M185 170 L215 170 M185 185 L215 185 M200 145 L200 195" 
        stroke="#1e40af" stroke-width="2" fill="none"/>
  
  <!-- Letters B, S, I -->
  <text x="160" y="210" font-family="Arial, sans-serif" font-size="32" font-weight="bold" fill="#1e40af">B</text>
  <text x="240" y="210" font-family="Arial, sans-serif" font-size="32" font-weight="bold" fill="#1e40af">S</text>
  <text x="200" y="300" font-family="Arial, sans-serif" font-size="32" font-weight="bold" fill="#1e40af">I</text>
  
  <!-- Decorative elements -->
  <path d="M140 230 C155 225 165 235 180 230" stroke="#60a5fa" stroke-width="3" fill="none"/>
  <path d="M220 230 C235 225 245 235 260 230" stroke="#60a5fa" stroke-width="3" fill="none"/>
  
  <!-- Bottom text -->
  <text x="200" y="360" font-family="Arial, sans-serif" font-size="16" font-weight="bold" 
        text-anchor="middle" fill="#1e3a8a">Doisaket District Chiangmai</text>
</svg>