<?php 
	
	require_once 'database.php';


	class M_mon_an extends database {

		public function Doc_mon_an() {
			$sql = "select * from mon_an";
			$this -> setQuery($sql);
			return $this -> loadAllRows();
		}

		public function Doc_mon_an_theo_id($id) {
			$sql = "SELECT * FROM mon_an WHERE ma_mon = ?";
			$this->setQuery($sql);
			return $this->loadRow([$id]);
		}

		public function Cap_nhat_mon_an($ma_mon, $ten_mon, $noi_dung_chi_tiet, $hinh, $don_gia) {
			$db = new database();
		
			// Sử dụng prepared statement để tránh SQL injection
			$sql = "UPDATE mon_an SET ten_mon = ?, noi_dung_chi_tiet = ?, hinh = ?, don_gia = ? WHERE ma_mon = ?";
			$db->setQuery($sql);
			
			// Bind các giá trị vào câu lệnh SQL
			$result = $db->execute(array($ten_mon, $noi_dung_chi_tiet, $hinh, $don_gia, $ma_mon));
		
			// Kiểm tra kết quả của câu lệnh SQL
			if ($result) {
				return true; // Trả về true nếu cập nhật thành công
			} else {
				return false; // Trả về false nếu cập nhật thất bại
			}
		}
		public function Xoa_mon_an($ma_mon) {
			$sql = "DELETE FROM mon_an WHERE ma_mon = ?";
			$this->setQuery($sql);
			return $this->execute(array($ma_mon));
		}
		
	}


	