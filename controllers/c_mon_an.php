<?php 
	
	require_once './models/m_mon_an.php';


	class C_mon_an {

		public function Hien_thi_mon_an() {
			$m_mon_an = new M_mon_an();
			$mon_ans = $m_mon_an -> Doc_mon_an();
			// view 
			include './views/v_mon_an.php';
			
			
		}

		public function Hien_thi_chi_tiet_mon_an($id) {
			$m_mon_an = new M_mon_an();
			$mon_an = $m_mon_an->Doc_mon_an_theo_id($id);

	
			// Kiểm tra xem món ăn có tồn tại hay không
			if ($mon_an) {
				// Hiển thị view chi tiết món ăn
				include './views/v_chi_tiet_mon_an.php';
			} else {
				echo "Món ăn không tồn tại.";
			}
		}

		public function Xoa_mon_an($ma_mon) {
			
			$m_mon_an = new M_mon_an();
			$ket_qua = $m_mon_an->Xoa_mon_an($ma_mon);
			
			if ($ket_qua) {
				// Xóa thành công, chuyển hướng hoặc thực hiện hành động phù hợp
				echo "Món ăn đã được xóa thành công.";
			} else {
				// Xóa thất bại, thông báo lỗi hoặc thực hiện xử lý phù hợp
				echo "Có lỗi xảy ra khi xóa món ăn.";
			}
		}

		
	}
?>
