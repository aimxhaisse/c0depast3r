;; paste region to c0depast3r
(require 'http-post-simple)
(defun c0depast3r-paste ()
  "paste a chunk of code to pastebin.buffout.org"
  (interactive)
  (http-post-simple "http://pastebin.buffout.org/add"
                    (list (list 'author (getenv "USER"))
                          (list 'code (buffer-substring (region-beginning) (region-end))))))
