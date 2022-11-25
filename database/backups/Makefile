
DB = whatstheweatherlike

.PHONY: backup
backup: ## Make backup
	mysqldump -h 127.0.0.1 -u root -p --complete-insert $(DB) > $(shell date +"dump-$(DB)-%Y-%m-%dT%H:%M:%S.sql")

