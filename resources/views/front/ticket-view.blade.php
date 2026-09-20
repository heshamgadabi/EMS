<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>تذكرة الفعالية</title>
<link href="{{ asset('front/css/bootstrap.rtl.min.css') }}" rel="stylesheet">
<link href="{{ asset('front/css/qr-ticket.css') }}" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&family=IBM+Plex+Mono:wght@500;600&display=swap" rel="stylesheet">

</head>
<body>

<div class="stage">
  <div class="stage-label">تذكرتك جاهزة — بعد إتمام الدفع بنجاح</div>

  <div class="pass">

    <div class="pass-head">
      <div class="head-top">
        <div class="head-brand"><span class="dot"></span> تيكت فلو</div>
        <div class="head-status">تم الدفع</div>
      </div>
      <div class="head-event">
        <div class="head-cat"> {{ $event->title }} </div>
        <div class="head-title">{{ $ticket->title }}</div>
      </div>
    </div>

    <div class="pass-divider">
      <div class="cut left"></div>
      <div class="cut right"></div>
      <div class="dash"></div>
    </div>

    @php
    $date = \Carbon\Carbon::parse($event->start_time)->locale('ar');
    @endphp
    <div class="pass-body">
      <div class="info-grid">
        <div class="info-item">
          <div class="lbl">التاريخ</div>
          <div class="val">{{ $date->format('d') }} {{ $date->translatedFormat('F') }} <small> {{ $date->translatedFormat('l') }} {{ $date->format('Y') }}</small></div>
        </div>
        <div class="info-item">
          <div class="lbl">الوقت</div>
          <div class="val">{{ $date->format('H:i') }} <small>الدخول {{ $date->format('H:i') }} </small></div>
        </div>
        <div class="info-item">
          <div class="lbl">الفئة</div>
          <div class="val"> {{ $ticket->title }} </div>
        </div>
        <div class="info-item">
          <div class="lbl">العدد</div>
          <div class="val"> {{ $invoice_ticket->quantity }} </div>
        </div>
        <div class="info-item span-2">
          <div class="lbl">المكان</div>
          <div class="val"> {{ $event->location }} </div>
        </div>
      </div>

      <div class="holder">
        <div class="holder-avatar">{{ $invoice_ticket->quantity }}</div>
        <div>
          <div class="holder-name">{{ $user_invoice->name }}</div>
          <div class="holder-role">حامل التذكرة</div>
        </div>
      </div>
    </div>

    <div class="pass-divider2">
      <div class="cut left"></div>
      <div class="cut right"></div>
      <div class="dash"></div>
    </div>

    <div class="pass-scan">
      <img class="qr-box" src="{{ $qrCodeImage }}" alt="Barcode" />
      <div class="serial">{{ $invoice_ticket->confirmation }}</div>
      <div class="scan-hint">اعرض هذا الرمز عند بوابة الدخول</div>
    </div>

  </div>

  <div class="actions">
    <button class="btn-action btn-primary" id="downloadBtn">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3v12"/><path d="m7 10 5 5 5-5"/><path d="M5 21h14"/></svg>
      تحميل PDF
    </button>
    <a href="{{ route('front.tickets.checkout.success', ['id' => $invoice_ticket->invoice_id]) }}" class="btn-action btn-secondary">
    عودة
    </a>
  </div>

  <div class="hint">
    هذه التذكرة صالحة لدخول واحد فقط<br>
    يمكنك إضافتها إلى محفظتك لسهولة الوصول إليها
  </div>
</div>

<script>
  const qr = document.getElementById('qrBox');
  const pattern = [
    1,1,1,0,1,1,1,
    1,0,1,0,1,0,1,
    1,1,1,0,0,1,1,
    0,0,1,1,0,0,0,
    1,1,0,1,1,0,1,
    1,0,1,0,0,1,1,
    1,1,1,0,1,1,1
  ];
  pattern.forEach(v=>{
    const s = document.createElement('span');
    if(!v) s.classList.add('off');
    qr.appendChild(s);
  });
</script>

<script src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<script>
  
  
  document.getElementById('downloadBtn').addEventListener('click', async function(){
    const btn = this;
    const originalHtml = btn.innerHTML;
    btn.disabled = true;
    btn.innerHTML = 'جاري التجهيز...';

    try {
      const passEl = document.querySelector('.pass');
      const canvas = await html2canvas(passEl, {
        scale: 3,
        backgroundColor: '#ffffff',
        useCORS: true
      });

      const imgData = canvas.toDataURL('image/png');
      const { jsPDF } = window.jspdf;

      const pxToMm = px => px * 0.264583;
      const pdfWidth = pxToMm(canvas.width / 3);
      const pdfHeight = pxToMm(canvas.height / 3);

      const pdf = new jsPDF({
        orientation: pdfHeight > pdfWidth ? 'portrait' : 'landscape',
        unit: 'mm',
        format: [pdfWidth, pdfHeight]
      });

      pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
      pdf.save('ticket-{{ $invoice_ticket->confirmation }}.pdf');
    } catch (err) {
      console.error(err);
      alert('تعذر إنشاء ملف PDF، حاول مرة أخرى');
    } finally {
      btn.disabled = false;
      btn.innerHTML = originalHtml;
    }
  });
</script>
</body>
</html>
