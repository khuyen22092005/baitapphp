<?php
// Hàm lấy và làm sạch dữ liệu theo phương thức
function get_value($method, $key) {
    $input_type = $method === 'GET' ? INPUT_GET : INPUT_POST;
    $value = filter_input($input_type, $key, FILTER_SANITIZE_SPECIAL_CHARS);
    return $value ?? '';
}

// Xác định phương thức nào có dữ liệu
$has_get  = !empty($_GET);
$has_post = !empty($_POST);

// Lấy dữ liệu GET
$get_data = [
    'ten_sach'     => get_value('GET', 'ten_sach'),
    'tac_gia'      => get_value('GET', 'tac_gia'),
    'nxb'          => get_value('GET', 'nxb'),
    'nam_xb'       => get_value('GET', 'nam_xb'),
];

// Lấy dữ liệu POST
$post_data = [
    'ten_sach'     => get_value('POST', 'ten_sach'),
    'tac_gia'      => get_value('POST', 'tac_gia'),
    'nxb'          => get_value('POST', 'nxb'),
    'nam_xb'       => get_value('POST', 'nam_xb'),
];
?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Form Sách - GET & POST</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
  :root { font-family: system-ui, Arial, sans-serif; }
  body { margin: 0; background: #f5f7fb; color: #222; }
  .wrap { max-width: 1100px; margin: 40px auto; padding: 0 20px; }
  h1 { font-size: 22px; margin: 0 0 16px; }
  .grid { display: grid; gap: 20px; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); }
  .card { background: #fff; border-radius: 14px; box-shadow: 0 4px 16px rgba(0,0,0,.07); padding: 18px; }
  label { display:block; font-size: 13px; margin: 10px 0 6px; color:#444; }
  input { width:100%; padding:10px 12px; border:1px solid #d9d9e3; border-radius:10px; outline:none; }
  input:focus { border-color:#6c7cff; box-shadow:0 0 0 3px rgba(108,124,255,.15); }
  .row { display:flex; gap:10px; }
  .row > * { flex:1; }
  button { margin-top:14px; padding:10px 14px; border:0; background:#6c7cff; color:#fff; border-radius:10px; cursor:pointer; font-weight:600; }
  button:hover { filter:brightness(0.95); }
  .muted { color:#667085; font-size:12px; margin-top:6px; }
  .result h2 { margin:0 0 10px; font-size:18px; }
  .kv { display:grid; grid-template-columns: 140px 1fr; gap:10px 14px; font-size:14px; }
  .key { color:#666; }
  .empty { color:#999; font-style:italic; }
  footer { margin-top: 30px; font-size: 12px; color:#777; }
</style>
</head>
<body>
<div class="wrap">
  <h1>Biểu mẫu nhập sách (GET &amp; POST)</h1>

  <div class="grid">
    <!-- Form dùng GET -->
    <div class="card">
      <h2>Form dùng GET</h2>
      <form method="get" action="">
        <label for="g_ten_sach">Tên sách</label>
        <input id="g_ten_sach" name="ten_sach" value="<?= htmlspecialchars($get_data['ten_sach']) ?>">

        <label for="g_tac_gia">Tác giả</label>
        <input id="g_tac_gia" name="tac_gia" value="<?= htmlspecialchars($get_data['tac_gia']) ?>">

        <label for="g_nxb">Nhà xuất bản</label>
        <input id="g_nxb" name="nxb" value="<?= htmlspecialchars($get_data['nxb']) ?>">

        <label for="g_nam_xb">Năm xuất bản</label>
        <input id="g_nam_xb" name="nam_xb" type="number" min="0" max="2100" value="<?= htmlspecialchars($get_data['nam_xb']) ?>">

        <button type="submit">Gửi (GET)</button>
        <div class="muted">Gửi kèm dữ liệu trên URL (query string).</div>
      </form>
    </div>

    <!-- Form dùng POST -->
    <div class="card">
      <h2>Form dùng POST</h2>
      <form method="post" action="">
        <label for="p_ten_sach">Tên sách</label>
        <input id="p_ten_sach" name="ten_sach" value="<?= htmlspecialchars($post_data['ten_sach']) ?>">

        <label for="p_tac_gia">Tác giả</label>
        <input id="p_tac_gia" name="tac_gia" value="<?= htmlspecialchars($post_data['tac_gia']) ?>">

        <label for="p_nxb">Nhà xuất bản</label>
        <input id="p_nxb" name="nxb" value="<?= htmlspecialchars($post_data['nxb']) ?>">

        <label for="p_nam_xb">Năm xuất bản</label>
        <input id="p_nam_xb" name="nam_xb" type="number" min="0" max="2100" value="<?= htmlspecialchars($post_data['nam_xb']) ?>">

        <button type="submit">Gửi (POST)</button>
        <div class="muted">Gửi dữ liệu trong thân (body) của request.</div>
      </form>
    </div>

    <!-- Kết quả -->
    <div class="card result">
      <h2>Kết quả nhận được</h2>

      <h3>Qua GET:</h3>
      <?php if ($has_get): ?>
        <div class="kv">
          <div class="key">Tên sách</div><div><?= $get_data['ten_sach'] ?: '<span class="empty">—</span>' ?></div>
          <div class="key">Tác giả</div><div><?= $get_data['tac_gia'] ?: '<span class="empty">—</span>' ?></div>
          <div class="key">Nhà XB</div><div><?= $get_data['nxb'] ?: '<span class="empty">—</span>' ?></div>
          <div class="key">Năm XB</div><div><?= $get_data['nam_xb'] ?: '<span class="empty">—</span>' ?></div>
        </div>
      <?php else: ?>
        <div class="muted">Chưa có dữ liệu GET.</div>
      <?php endif; ?>

      <h3>Qua POST:</h3>
      <?php if ($has_post): ?>
        <div class="kv">
          <div class="key">Tên sách</div><div><?= $post_data['ten_sach'] ?: '<span class="empty">—</span>' ?></div>
          <div class="key">Tác giả</div><div><?= $post_data['tac_gia'] ?: '<span class="empty">—</span>' ?></div>
          <div class="key">Nhà XB</div><div><?= $post_data['nxb'] ?: '<span class="empty">—</span>' ?></div>
          <div class="key">Năm XB</div><div><?= $post_data['nam_xb'] ?: '<span class="empty">—</span>' ?></div>
        </div>
      <?php else: ?>
        <div class="muted">Chưa có dữ liệu POST.</div>
      <?php endif; ?>
    </div>
  </div>

  <footer>
    Gợi ý: Với GET, bạn sẽ thấy giá trị xuất hiện trên thanh địa chỉ (vd: <code>?ten_sach=...</code>), còn POST thì không.
  </footer>
</div>
</body>
</html>
