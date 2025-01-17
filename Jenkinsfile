pipeline {
    agent any
    stages {
        stage('Pull Code') {
    steps {
        sh '''
        rm -rf /home/ishtaya/Desktop/unixproject || true
        git clone https://github.com/adanmass/projectunix.git /home/ishtaya/Desktop/unixproject
        '''
    }
}

        
        stage('Deploy part 1') {
            steps {
                sh '''
                   cd /home/ishtaya/Desktop/unixproject
                   docker ps -a
                   pwd
                   docker compose down -v
                '''
            }
        }
        
        stage('Deploy part 2') {
            steps {
                sh '''
                   cd /home/ishtaya/Desktop/unixproject
                   docker compose up -d
                '''
            }
        }
    }
}
