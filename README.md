Nếu bạn muốn push từ một nhánh khác vào nhánh main, bạn có thể thực hiện theo các bước sau:

Chuyển sang nhánh main:

git checkout main
Lấy các thay đổi mới nhất từ nhánh main trên máy chủ:

git pull origin main
Chuyển lại sang nhánh bạn muốn push từ:

git checkout <tên-nhánh-khác>
Rebase nhánh hiện tại của bạn trên nhánh main:

git rebase main
Điều này sẽ đặt commit của bạn lên trên cùng của lịch sử commit của nhánh main.

Chuyển lại nhánh main:

git checkout main
Merge nhánh hiện tại của bạn vào nhánh main:

git merge <tên-nhánh-khác>
Hoặc nếu bạn đã rebase:

git merge --ff-only <tên-nhánh-khác>
Push các thay đổi lên nhánh main:

git push origin main