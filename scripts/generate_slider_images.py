from pathlib import Path
from PIL import Image, ImageDraw, ImageFont

base = Path(__file__).resolve().parent.parent / 'public' / 'images'
base.mkdir(parents=True, exist_ok=True)

slides = [
    ('slide-1.jpg', 'MERIDIAN', '#d4af6a', '#0c1324'),
    ('slide-2.jpg', 'NORTHBRIDGE', '#d4af6a', '#eef2f7'),
    ('slide-3.jpg', 'ATLAS TRADE', '#d4af6a', '#091827'),
]

for filename, text, accent_hex, bg_hex in slides:
    img = Image.new('RGB', (1600, 900), bg_hex)
    draw = ImageDraw.Draw(img)

    for x in range(0, 1600, 280):
        draw.line((x, 900, x + 200, 0), fill=(255, 255, 255, 30), width=2)

    try:
        title_font = ImageFont.truetype('DejaVuSerif-Italic.ttf', 120)
        small_font = ImageFont.truetype('DejaVuSans-Bold.ttf', 28)
    except Exception:
        title_font = ImageFont.load_default()
        small_font = ImageFont.load_default()

    accent = tuple(int(accent_hex[i:i+2], 16) for i in (1, 3, 5))
    draw.text(((1600 - draw.textbbox((0, 0), text, font=title_font)[2]) / 2, 330), text, font=title_font, fill=accent)
    draw.text((200, 640), 'GLOBAL TREASURY', font=small_font, fill=(255, 255, 255, 180))

    img.save(base / filename, quality=90)
    print(f'Created {base / filename}')
