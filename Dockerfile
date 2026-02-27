FROM openemr/openemr:latest

# Copy our custom AI Assistant UI wrapper
COPY interface/agentforge-clinical/index.php /var/www/localhost/htdocs/openemr/interface/agentforge-clinical/index.php

# Copy our modified menu to add the AI Assistant tab
COPY interface/main/tabs/menu/menus/standard.json /var/www/localhost/htdocs/openemr/interface/main/tabs/menu/menus/standard.json

# Fix permissions
RUN chown -R apache:apache /var/www/localhost/htdocs/openemr/interface/agentforge-clinical && \
    chown apache:apache /var/www/localhost/htdocs/openemr/interface/main/tabs/menu/menus/standard.json
