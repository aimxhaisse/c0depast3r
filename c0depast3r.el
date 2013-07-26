;; install deps
(require 'package)
(add-to-list 'package-archives '("melpa" . "http://melpa.milkbox.net/packages/") t)
(package-initialize)
(package-refresh-contents)

(defun load-deps (lst)
  "auto-install a dep if not there"
  (if lst
      (progn (when (not (require (car lst) nil t))
               (package-install (car lst)))
	     (load-deps (cdr lst)))))

(load-deps '(http-post-simple))

;; paste region to c0depast3r
(require 'http-post-simple)
(defun c0depast3r-paste ()
  "paste a chunk of code to code.sbrk.org"
  (interactive)
  (http-post-simple "http://code.sbrk.org/add"
                    (list (list 'author (getenv "USER"))
                          (list 'code (buffer-substring (region-beginning) (region-end))))))
