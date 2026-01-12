<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Détails du Partenaire</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo {
            max-width: 150px;
            margin-bottom: 20px;
        }
        .details {
            margin-top: 30px;
        }
        .details div {
            margin-bottom: 10px;
        }
        .label {
            font-weight: bold;
        }
        .section-title {
            background-color: #1e3a8a;
            color: white;
            padding: 12px 15px;
            margin-top: 25px;
            margin-bottom: 15px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 4px;
        }
        .section-content {
            margin-bottom: 20px;
            padding: 15px;
            background-color: #f8f9fa;
            border-left: 4px solid #1e3a8a;
        }
        .section-content ul {
            margin: 10px 0;
            padding-left: 20px;
        }
        .section-content li {
            margin: 8px 0;
            line-height: 1.6;
        }
        .code-section {
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            padding: 15px;
            margin: 10px 0;
            border-radius: 4px;
            font-family: 'Courier New', monospace;
            font-size: 12px;
            overflow-x: auto;
        }
        .partner-info-card {
            background-color: #ffffff;
            border: 2px solid #1e3a8a;
            padding: 20px;
            margin: 20px 0;
            border-radius: 6px;
        }
        .partner-info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-top: 15px;
        }
        .partner-info-item {
            margin-bottom: 15px;
        }
        .partner-info-item .label {
            color: #1e3a8a;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: block;
            margin-bottom: 5px;
        }
        .partner-info-item span {
            font-size: 14px;
            color: #333;
            display: block;
        }
        .status-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 12px;
        }
        .status-active {
            background-color: #d4edda;
            color: #155724;
        }
        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }
        .status-inactive {
            background-color: #f8d7da;
            color: #721c24;
        }
        .status-suspended {
            background-color: #f5c2c7;
            color: #721c24;
        }
        .status-archived {
            background-color: #e2e3e5;
            color: #383d41;
        }
        .signature-section {
            margin-top: 40px;
            padding-top: 30px;
            border-top: 2px solid #1e3a8a;
        }
        .signature-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            margin-top: 40px;
        }
        .signature-line {
            border-top: 2px solid #333;
            margin-top: 60px;
            text-align: center;
            font-size: 12px;
            color: #666;
        }
        .date-line {
            margin-top: 20px;
        }
        .note-section {
            background-color: #e8f4f8;
            border-left: 4px solid #17a2b8;
            padding: 15px;
            margin-top: 15px;
            border-radius: 4px;
        }
        .page-break {
            page-break-after: always;
            margin-bottom: 40px;
        }
        .signature-image {
            filter: contrast(1.5) brightness(0.9);
            max-width: 250px;
            height: auto;
            border: 1px solid #333;
            border-radius: 4px;
            background-color: white;
            padding: 5px;
        }
        .signature-image-small {
            filter: contrast(1.5) brightness(0.9);
            max-height: 60px;
            margin-top: 5px;
            background-color: white;
            padding: 3px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <!-- Logo Flamx -->
    <div style="text-align: center; margin-bottom: 40px; padding-bottom: 20px; border-bottom: 3px solid #1e3a8a;">
        <div style="display: flex; align-items: center; justify-content: center; gap: 12px;">
            <svg style="width: 40px; height: 40px; color: #1e3a8a;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M6 13c0-1 .5-3 3-5 1.5-1.2 2.5-2 2.5-4 0-1.5-1-2.5-2.5-2.5-2.5 0-4.5 3-4.5 8 0 2 1 4 1.5 4.5"></path>
                <path d="M18 13c0-1-.5-3-3-5-1.5-1.2-2.5-2-2.5-4 0-1.5 1-2.5 2.5-2.5 2.5 0 4.5 3 4.5 8 0 2-1 4-1.5 4.5"></path>
                <path d="M12 17v4"></path>
            </svg>
            <span style="font-size: 28px; font-weight: bold; color: #1e3a8a;">Flamx</span>
        </div>
        <p style="margin-top: 8px; color: #666; font-size: 12px; font-style: italic;">Solutions de Sécurité Incendie</p>
    </div>

    <div class="header">
        <h1>CONTRAT D’ENGAGEMENT ET D’UTILISATION</h1>
    </div>

     <!-- Section Charte de Flamx -->
    <div class="section-title">Parties Prenantes</div>
    <div class="section-content">
        <p><strong>FlamX, Client, Revendeur et Partenaire Stratégique œuvrent ensemble pour la sécurité du système .</strong></p>
        <ul>
            <li><strong>FlamX :</strong> Propriétaire du dispositif Sentinelle Feu.</li>
            <li><strong>Le Client : :</strong> Utilisateur final du système. </li>
            <li><strong>Transparence :</strong> Communication claire, honnête et régulière avec Flamx et nos clients</li>
            <li><strong>Le Revendeur :</strong> Intermédiaire commercial ou installateur certifié par FlamX.</li>
            <li><strong>Le Partenaire Stratégique (financier, juridique ou institutionnel) :</strong> Entité apportant un soutien essentiel à la mise en œuvre, au financement ou à la conformité du système.</li>
        </ul>
        
    </div>
    <!-- Section Charte d'Engagement -->
    <div class="section-title">Objectifs de la Charte</div>
    <div class="section-content">
        
        <ul>
            <li> Garantir une utilisation sûre, conforme et performante du système Sentinelle Feu.</li>
            <li>Préciser les engagements de chaque partie pour assurer la fiabilité du dispositif.</li>
            <li> Protéger les intérêts techniques, financiers, juridiques et commerciaux liés au système.</li>

        </ul>
    </div>

     <div class="section-title">Engagements de FlamX</div>
    <div class="section-content">
        <p><strong>FlamX s’engage à :</strong></p>
        <ul>
            <li> Fournir un dispositif conforme aux normes en vigueur.</li>
            <li>Mettre à disposition la documentation et l’assistance technique.</li>
            <li> Assurer la maintenance et la fiabilité du système.</li>
            <li>Protéger la confidentialité des données collectées.</li>
            <li>Préserver la propriété technologique et logicielle du dispositif.</li>

        </ul>
        
    </div>
    <!-- Section Responsabilité de FlamX  -->
    <div class="section-title">Responsabilité de FlamX</div>
    <div class="section-content">
        <p><strong>FlamX ne peut être tenue responsable :</strong></p>
        <ul>
            <li>En cas d’installation non certifiée ou d’utilisation incorrecte. </li>
            <li>Si le matériel est modifié ou mal entretenu par le Client.</li>
            <li> En cas de force majeure.</li>
            <li>Pour l’élimination totale du risque incendie.</li>
            <li>Préserver la propriété technologique et logicielle du dispositif.</li>
         <p>La responsabilité de FlamX est limitée à la valeur du matériel fourni.</p>
        </ul>
    </div><br><br>

    <!-- Section Engagements du Client  -->
    <div class="section-title">Engagements du Client</div>
    <div class="section-content">
        <p><strong>Le Client s’engage à :</strong></p>
        <ul>
            <li>Utiliser le système selon les instructions officielles. </li>
            <li>Ne pas modifier, détourner ou réparer le dispositif sans autorisation.</li>
            <li>Maintenir les conditions environnementales nécessaires.</li>
            <li>Signaler tout incident ou anomalie.</li>
            <li>Former les utilisateurs internes et assurer un usage conforme.</li>
         
        </ul>
    </div>
    
     <!-- Section Engagements du Revendeur  -->
    <div class="section-title">Engagements du Revendeur</div>
    <div class="section-content">
        <p><strong>Le Revendeur s’engage à :</strong></p>
        <ul>
            <li>Représenter FlamX avec loyauté et professionnalisme. </li>
            <li>Installer le système selon les protocoles certifiés.</li>
            <li>Ne communiquer que des informations validées par FlamX </li>
            <li>Signaler tout incident ou anomalie.</li>
            <li>Garantir la confidentialité et le respect des engagements commerciaux.</li>
         
        </ul>
    </div>
      <!-- Section Engagements du Partenaire Stratégique-->
    <div class="section-title">Engagements du Partenaire Stratégique</div>
    <div class="section-content">
        <p><strong>Le Partenaire Stratégique (financier, juridique, institutionnel ou autre) s’engage à :</strong></p>
        <ul>
            <li><strong>Soutenir la mise en œuvre du système </strong> selon son domaine d’expertise (ex. financement, audit, conformité réglementaire, certification).</li>
            <li><strong>Garantir la transparence et la loyauté </strong> dans toutes ses contributions. </li>
            <li><strong>Respecter la confidentialité </strong>  des informations techniques, financières ou juridiques échangées.</li>
            <li><strong>Contribuer à la sécurisation des opérations, </strong> notamment lors de phases critiques (installation, contractualisation, audits).</li>
            <li><strong>Le Partenaire Stratégique (financier, juridique ou institutionnel) :</strong> Entité apportant un soutien essentiel à la mise en œuvre, au financement ou à la conformité du système.</li>
            <li><strong>Assurer un accompagnement fiable </strong> pour renforcer la conformité légale, financière et sécuritaire autour du dispositif. </li>
        </ul>
        
    </div>

        <!-- Section Engagements du Partenaire Stratégique-->
    <div class="section-title">Données & Propriété Intellectuelle</div>
    <div class="section-content">
        <ul>
            <li>Les données collectées se limitent aux besoins de sécurité incendie.</li>
            <li>FlamX reste propriétaire exclusif des droits technologiques et logiciels. </li>
            <li>Toute copie, modification ou exploitation non autorisée est formellement interdite.</li>
        </ul>
        
    </div>
    <!-- Section Maintenance-->
    <div class="section-title">Maintenance</div>
    <div class="section-content">
        <ul>
            <li>La maintenance doit respecter les procédures officielles FlamX.</li>
            <li>Un manque d’entretien suspend les garanties.</li>
            <li>Le Client/Revendeur doit garantir l’accès au système pour les équipes habilitées.</li>
        </ul>
        
    </div>
    
    <!-- Section Politique de Travail -->
     
    <div class="section-title"> Politique de Travail</div>
    <div class="section-content">
        <p><strong>Les principes de collaboration avec Flamx sont les suivants :</strong></p>
        <ul>
            <li><strong>Intégrité :</strong> Respect des valeurs éthiques et professionnelles dans toutes les transactions</li>
            <li><strong>Excellence :</strong> Fourniture de services et produits de qualité supérieure à nos clients</li>
            <li><strong>Transparence :</strong> Communication claire, honnête et régulière avec Flamx et nos clients</li>
            <li><strong>Innovation :</strong> Amélioration continue et adaptation aux évolutions du marché</li>
            <li><strong>Soutien :</strong> Assistance constante, formation régulière et partage d'expertise</li>
            <li><strong>Respect des délais :</strong> Engagement ferme à respecter les délais de livraison et de service convenus</li>
            <li><strong>Qualité garantie :</strong> Assurance que tous les produits et services fournis respectent les normes de qualité établies</li>
            <li><strong>Formation continue :</strong> Participation régulière aux programmes de formation et certification proposés</li>
            <li><strong>Conformité légale :</strong> Respect strict des normes, réglementations et certifications applicables au secteur</li>
            <li><strong>Responsabilité sociale :</strong> Engagement envers la durabilité environnementale et la responsabilité sociale</li>
            <li><strong>Reporting régulier :</strong> Fourniture de rapports périodiques sur les performances et les activités</li>
            <li><strong>Support client :</strong> Assistance professionnelle et réactive aux clients finaux</li>
        </ul>
    </div>
    <!-- Section Engagements du Partenaire Stratégique-->
    <div class="section-title">Durée & Résiliation</div>
    <div class="section-content">
        <p><strong>FlamX peut résilier sans préavis en cas de :</strong></p>
        <ul>
            <li>Violation grave des engagements.</li>
            <li>Fraude ou modification non autorisée du système. </li>
            <li>Mise en danger des personnes ou des biens.</li>
            <p>Aucun dédommagement n’est dû en cas de résiliation pour faute.</p>
        </ul>
        
    </div>
    

    <!-- Section Code QR pour accès aux documents -->
    <div class="section-title"> Accès aux Documents Partenaires</div>
    <div class="section-content">
        <p><strong>Numéro d'enregistrement du partenaire :</strong></p>
        <div class="code-section">
            Partner-ID: {{ $partenaire->id }}<br>
            Hash: {{ md5($partenaire->id . $partenaire->email) }}
        </div>
        <p><em>Ce code d'accès permet de consulter les documents détaillés, le portail partenaire et les ressources commerciales sur la plateforme Flamx.</em></p>
    </div>

    <div class="page-break"></div>

    <!-- SECTION PARTENAIRE EN DERNIER -->
    <div class="section-title"> Informations du Partenaire</div>
    <div class="section-content">
        <p><strong>Détails d'identification et de contact du partenaire :</strong></p>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin: 20px 0;">
            <!-- Colonne 1 -->
            <div>
                <!-- Entreprise -->
                <div style="margin-bottom: 18px; padding-bottom: 15px; border-bottom: 1px solid #e0e0e0;">
                    <span style="color: #1e3a8a; font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px; font-weight: bold;">Entreprise :</span>
                    <span style="font-size: 14px; color: #333; line-height: 1.5;">{{ $partenaire->nom }}</span>
                </div>

                <!-- Email -->
                <div style="margin-bottom: 18px; padding-bottom: 15px; border-bottom: 1px solid #e0e0e0;">
                    <span style="color: #1e3a8a; font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px; font-weight: bold;">Email :</span>
                    <span style="font-size: 14px; color: #333; line-height: 1.5;">{{ $partenaire->email }}</span>
                </div>

                <!-- Téléphone -->
                @if($partenaire->telephone)
                <div style="margin-bottom: 0;">
                    <span style="color: #1e3a8a; font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px; font-weight: bold;">Téléphone :</span>
                    <span style="font-size: 14px; color: #333; line-height: 1.5;">{{ $partenaire->telephone }}</span>
                </div>
                @endif
            </div>

            <!-- Colonne 2 -->
            <div>
                <!-- Adresse -->
                @if($partenaire->adresse)
                <div style="margin-bottom: 18px; padding-bottom: 15px; border-bottom: 1px solid #e0e0e0;">
                    <span style="color: #1e3a8a; font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px; font-weight: bold;">Adresse :</span>
                    <span style="font-size: 14px; color: #333; line-height: 1.5;">{{ $partenaire->adresse }}</span>
                </div>
                @endif

                <!-- Site Web -->
                @if($partenaire->site_web)
                <div style="margin-bottom: 18px; padding-bottom: 15px; border-bottom: 1px solid #e0e0e0;">
                    <span style="color: #1e3a8a; font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px; font-weight: bold;">Site Web :</span>
                    <span style="font-size: 14px; color: #333; line-height: 1.5;">{{ $partenaire->site_web }}</span>
                </div>
                @endif

               
            </div>
        </div>

         <!-- Responsable & Type de Partenariat -->
        @if($partenaire->name || $partenaire->fonction || $partenaire->type)
        <div style="background-color: #e8f4f8; border-left: 4px solid #17a2b8; padding: 15px; margin-top: 20px; border-radius: 4px;">
            <strong style="color: #1e3a8a; font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px; display: block; margin-bottom: 8px;">Informations du Responsable</strong>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                @if($partenaire->name)
                <p style="margin: 0; line-height: 1.6; font-size: 13px; color: #555;"><strong>Responsable :</strong> {{ $partenaire->name }}</p>
                @endif
                @if($partenaire->fonction)
                <p style="margin: 0; line-height: 1.6; font-size: 13px; color: #555;"><strong>Fonction :</strong> {{ $partenaire->fonction }}</p>
                @endif
            </div>
            @if($partenaire->type)
            <p style="margin: 8px 0 0 0; line-height: 1.6; font-size: 13px; color: #555;"><strong>Type de Partenariat :</strong> 
                @switch($partenaire->type)
                    @case('commercial')
                        Commercial
                    @break
                    @case('financial')
                        Financier
                    @break
                    @case('technical')
                        Technique
                    @break
                    @case('supplier')
                        Fournisseur
                    @break
                    @case('legal')
                        Juridique
                    @break
                    @default
                        {{ $partenaire->type }}
                @endswitch
            </p>
            @endif
        </div>
        @endif

        <!-- Notes Complémentaires -->
        @if($partenaire->note)
        <div style="background-color: #e8f4f8; border-left: 4px solid #17a2b8; padding: 15px; margin-top: 20px; border-radius: 4px;">
            <strong style="color: #1e3a8a; font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px; display: block; margin-bottom: 8px;">Notes Complémentaires</strong>
            <p style="margin: 0; line-height: 1.6; font-size: 13px; color: #555;">{{ $partenaire->note }}</p>
        </div>
        @endif

       
    </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <!-- SECTION SIGNATURE -->
    <div class="signature-section">
        <div class="section-title">Signatures d'Acceptation</div>
        <p style="line-height: 1.6; margin-bottom: 15px;">
           La signature de la présente charte vaut engagement total des parties. Les copies numériques ont la même valeur que les originaux.
        </p>

        <!-- Signature Display -->
        @if($partenaire->signature)
        <div style="margin-bottom: 30px; padding: 20px; background-color: #1e3a8a; border: 1px solid #081742ff; border-radius: 4px;">
            <p style="font-size: 12px; color: #fbfcffff; font-weight: bold; margin-bottom: 10px;">Signature Électronique du Partenaire :</p>
            <img src="{{ $partenaire->signature }}" alt="Signature du partenaire" style="max-width: 250px; height: auto; border: 1px solid #ddd; border-radius: 4px;">
            <p style="font-size: 10px; color: #fffafaff; margin-top: 8px;">Signature enregistrée le {{ $partenaire->created_at->format('d/m/Y à H:i') }}</p>
        </div>
        @endif
        
        <div class="signature-grid">
            <div>
                <p style="font-weight: bold; margin-bottom: 40px;">Pour le Partenaire :</p>
                @if($partenaire->signature)
                <div style="margin-bottom: 20px;">
                    <p style="font-size: 11px; color: #666; margin: 0;">Signature électronique :</p>
                    <img src="{{ $partenaire->signature }}" alt="Signature" style="max-height: 60px; margin-top: 5px;">
                </div>
                <p style="font-size: 10px; color: #666; margin: 0;">{{ $partenaire->name ?? 'Responsable' }}</p>
                @else
                <div class="signature-line">
                    Signature
                </div>
                @endif
                <div class="signature-line date-line">
                    Date : {{ now()->format('d/m/Y') }}
                </div>
            </div>
            <div>
                <p style="font-weight: bold; margin-bottom: 40px;">Pour Flamx - Responsable Partenaires :</p>
                <div class="signature-line">
                    Signature
                </div>
                <div class="signature-line date-line">
                    Date : _______________
                </div>
            </div>
        </div>
    </div>

    <!-- PIED DE PAGE -->
    <div style="margin-top: 50px; padding-top: 20px; border-top: 1px solid #ccc; text-align: center; font-size: 10px; color: #999;">
        <p>Document généré le {{ now()->format('d/m/Y à H:i') }} - Flamx Solutions de Sécurité Incendie</p>
        <p>Confidentiel - Destiné au partenaire et à Flamx uniquement</p>
    </div>
</body>
</html>
