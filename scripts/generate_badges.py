#!/usr/bin/env python3
from pathlib import Path
from PIL import Image, ImageDraw, ImageFont

base = Path('public/images/crypto')
base.mkdir(parents=True, exist_ok=True)

coins = {
    'btc': ('#F7931A', '₿'),
    'eth': ('#627EEA', 'Ξ'),
    'sol': ('#14F195', 'S'),
    'star': ('#8B5CF6', '★'),
    'ada': ('#2CC0FF', 'A'),
    'dot': ('#E6007A', 'D'),
}

for name, (color, symbol) in coins.items():
    img = Image.new('RGBA', (64, 64), (0, 0, 0, 0))
    draw = ImageDraw.Draw(img)
    
    pad = 6
    bbox = [(pad, pad), (64-pad, 64-pad)]
    draw.rounded_rectangle(bbox, radius=18, fill=color)
    
    draw.ellipse((12, 12, 52, 52), outline=(255,255,255,40), width=2)
    
    try:
        font = ImageFont.truetype('DejaVuSans-Bold.ttf', 28)
    except Exception:
        font = ImageFont.load_default()
    
    bbox = draw.textbbox((0,0), symbol, font=font)
    tw = bbox[2] - bbox[0]
    th = bbox[3] - bbox[1]
    x = (64 - tw) / 2
    y = (64 - th) / 2 - 2
    
    draw.text((x, y), symbol, font=font, fill=(255,255,255,255))
    
    path = base / f'{name}.png'
    img.save(path)
    print(f'✓ created {path}')

print('\nDone! All badge images have been generated.')
