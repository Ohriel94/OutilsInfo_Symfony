import Axios from 'axios';
import React, { useState } from 'react';
import Box from '@mui/material/Box';
import Grid from '@mui/material/Grid';
import TextField from '@mui/material/TextField';
import Autocomplete from '@mui/material/Autocomplete';
import DragAndDrop from '../../../Components/DragAndDrop';

const Affectation = (props) => {
	const [ordinateurs, setOrdinateurs] = useState([
		[
			{
				_id: '627bec9b255ef2b6b5c2a661',
				serialNumber: '2430',
				etatDisponible: true,
				details: {
					marque: 'Dell',
					modele: 'Vostro 5502',
					dateAcquisition: '2019-06-03',
					configuration: {
						systeme: 'Windows 10 64x',
						processeur: 'intel core i7-1165G7 @ 2.80Ghz',
						memoire: '16',
						disque: '512',
					},
					notes: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam volutpat efficitur ultrices. Nulla pellentesque porta massa tempor imperdiet. Nam vel nisi ut mauris placerat rhoncus. In nec consectetur nunc, id elementum dui. Etiam posuere erat a sapien sollicitudin, sit amet cursus mauris iaculis. Cras fringilla sit amet risus id fermentum. Nullam volutpat leo sapien, sit amet eleifend leo congue quis. Nam pretium eu magna ac pretium. Aenean eget metus et ex posuere condimentum. Praesent finibus orci nisl, sit amet maximus nisl feugiat nec. Aliquam rutrum tincidunt sem, et convallis lacus laoreet quis. Vivamus id risus condimentum purus fringilla hendrerit sit amet quis nisl. Nunc congue urna at arcu tempor pulvinar. Nam sapien mauris, elementum quis augue condimentum, finibus commodo ex. In tortor nisi, egestas eu egestas eu, semper eu sem. Cras auctor eros urna, at sodales urna finibus sit amet. Nulla sed molestie est. Cras in lobortis ex. Sed nulla.',
				},
				id: 'item-74344235',
				title: '2430 - Dell Vostro 5502',
			},
			{
				_id: '627bec9b255ef2b6b5c2a662',
				serialNumber: '2431',
				etatDisponible: true,
				details: {
					marque: 'Dell',
					modele: 'Vostro 5502',
					dateAcquisition: '2019-06-03',
					configuration: {
						systeme: 'Windows 10 64x',
						processeur: 'intel core i7-1165G7 @ 2.80Ghz',
						memoire: '16',
						disque: '512',
					},
					notes: '',
				},
				id: 'item-82583228',
				title: '2431 - Dell Vostro 5502',
			},
			{
				_id: '627bec9b255ef2b6b5c2a663',
				serialNumber: '2432',
				etatDisponible: true,
				details: {
					marque: 'Dell',
					modele: 'Vostro 5502',
					dateAcquisition: '2019-06-03',
					configuration: {
						systeme: 'Windows 10 64x',
						processeur: 'intel core i7-1165G7 @ 2.80Ghz',
						memoire: '16',
						disque: '512',
					},
					notes: '',
				},
				id: 'item-19918115',
				title: '2432 - Dell Vostro 5502',
			},
			{
				_id: '627bec9b255ef2b6b5c2a664',
				serialNumber: '2433',
				etatDisponible: true,
				details: {
					marque: 'Dell',
					modele: 'Vostro 5502',
					dateAcquisition: '2019-06-03',
					configuration: {
						systeme: 'Windows 10 64x',
						processeur: 'intel core i7-1165G7 @ 2.80Ghz',
						memoire: '16',
						disque: '512',
					},
					notes: '',
				},
				id: 'item-87695444',
				title: '2433 - Dell Vostro 5502',
			},
			{
				_id: '627bec9b255ef2b6b5c2a665',
				serialNumber: '2434',
				etatDisponible: true,
				details: {
					marque: 'Dell',
					modele: 'Vostro 5502',
					dateAcquisition: '2019-06-03',
					configuration: {
						systeme: 'Windows 10 64x',
						processeur: 'intel core i7-1165G7 @ 2.80Ghz',
						memoire: '16',
						disque: '512',
					},
					notes: '',
				},
				id: 'item-80605002',
				title: '2434 - Dell Vostro 5502',
			},
			{
				_id: '627bec9b255ef2b6b5c2a666',
				serialNumber: '2435',
				etatDisponible: true,
				details: {
					marque: 'Dell',
					modele: 'Vostro 5502',
					dateAcquisition: '2019-06-03',
					configuration: {
						systeme: 'Windows 10 64x',
						processeur: 'intel core i7-1165G7 @ 2.80Ghz',
						memoire: '16',
						disque: '512',
					},
					notes: '',
				},
				id: 'item-61790569',
				title: '2435 - Dell Vostro 5502',
			},
			{
				_id: '627bec9b255ef2b6b5c2a667',
				serialNumber: '2436',
				etatDisponible: true,
				details: {
					marque: 'Dell',
					modele: 'Vostro 5502',
					dateAcquisition: '2019-06-03',
					configuration: {
						systeme: 'Windows 10 64x',
						processeur: 'intel core i7-1165G7 @ 2.80Ghz',
						memoire: '16',
						disque: '512',
					},
					notes: '',
				},
				id: 'item-89194282',
				title: '2436 - Dell Vostro 5502',
			},
			{
				_id: '627bec9b255ef2b6b5c2a668',
				serialNumber: '2437',
				etatDisponible: true,
				details: {
					marque: 'Dell',
					modele: 'Vostro 5502',
					dateAcquisition: '2019-06-03',
					configuration: {
						systeme: 'Windows 10 64x',
						processeur: 'intel core i7-1165G7 @ 2.80Ghz',
						memoire: '16',
						disque: '512',
					},
					notes: '',
				},
				id: 'item-73251501',
				title: '2437 - Dell Vostro 5502',
			},
			{
				_id: '627bec9b255ef2b6b5c2a669',
				serialNumber: '2438',
				etatDisponible: true,
				details: {
					marque: 'Dell',
					modele: 'Vostro 5502',
					dateAcquisition: '2019-06-03',
					configuration: {
						systeme: 'Windows 10 64x',
						processeur: 'intel core i7-1165G7 @ 2.80Ghz',
						memoire: '16',
						disque: '512',
					},
					notes: '',
				},
				id: 'item-34055313',
				title: '2438 - Dell Vostro 5502',
			},
			{
				_id: '627bec9b255ef2b6b5c2a66a',
				serialNumber: '2439',
				etatDisponible: true,
				details: {
					marque: 'Dell',
					modele: 'Vostro 5502',
					dateAcquisition: '2019-06-03',
					configuration: {
						systeme: 'Windows 10 64x',
						processeur: 'intel core i7-1165G7 @ 2.80Ghz',
						memoire: '16',
						disque: '512',
					},
					notes: '',
				},
				id: 'item-73199587',
				title: '2439 - Dell Vostro 5502',
			},
			{
				_id: '627bec9b255ef2b6b5c2a66b',
				serialNumber: '2440',
				etatDisponible: true,
				details: {
					marque: 'Dell',
					modele: 'Vostro 5502',
					dateAcquisition: '2019-06-03',
					configuration: {
						systeme: 'Windows 10 64x',
						processeur: 'intel core i7-1165G7 @ 2.80Ghz',
						memoire: '16',
						disque: '512',
					},
					notes: '',
				},
				id: 'item-61197070',
				title: '2440 - Dell Vostro 5502',
			},
			{
				_id: '627bec9b255ef2b6b5c2a66c',
				serialNumber: '2441',
				etatDisponible: true,
				details: {
					marque: 'Dell',
					modele: 'Vostro 5502',
					dateAcquisition: '2019-06-03',
					configuration: {
						systeme: 'Windows 10 64x',
						processeur: 'intel core i7-1165G7 @ 2.80Ghz',
						memoire: '16',
						disque: '512',
					},
					notes: '',
				},
				id: 'item-77472851',
				title: '2441 - Dell Vostro 5502',
			},
			{
				_id: '627bec9b255ef2b6b5c2a66d',
				serialNumber: '2442',
				etatDisponible: true,
				details: {
					marque: 'Dell',
					modele: 'Vostro 5502',
					dateAcquisition: '2019-06-03',
					configuration: {
						systeme: 'Windows 10 64x',
						processeur: 'intel core i7-1165G7 @ 2.80Ghz',
						memoire: '16',
						disque: '512',
					},
					notes: '',
				},
				id: 'item-54860055',
				title: '2442 - Dell Vostro 5502',
			},
			{
				_id: '627bec9b255ef2b6b5c2a66e',
				serialNumber: '2443',
				etatDisponible: true,
				details: {
					marque: 'Dell',
					modele: 'Vostro 5502',
					dateAcquisition: '2019-06-03',
					configuration: {
						systeme: 'Windows 10 64x',
						processeur: 'intel core i7-1165G7 @ 2.80Ghz',
						memoire: '16',
						disque: '512',
					},
					notes: '',
				},
				id: 'item-86501112',
				title: '2443 - Dell Vostro 5502',
			},
			{
				_id: '627bec9b255ef2b6b5c2a66f',
				serialNumber: '2444',
				etatDisponible: true,
				details: {
					marque: 'Dell',
					modele: 'Vostro 5502',
					dateAcquisition: '2019-06-03',
					configuration: {
						systeme: 'Windows 10 64x',
						processeur: 'intel core i7-1165G7 @ 2.80Ghz',
						memoire: '16',
						disque: '512',
					},
					notes: '',
				},
				id: 'item-3503052',
				title: '2444 - Dell Vostro 5502',
			},
			{
				_id: '627bec9b255ef2b6b5c2a670',
				serialNumber: '2445',
				etatDisponible: true,
				details: {
					marque: 'Dell',
					modele: 'Vostro 5502',
					dateAcquisition: '2019-06-03',
					configuration: {
						systeme: 'Windows 10 64x',
						processeur: 'intel core i7-1165G7 @ 2.80Ghz',
						memoire: '16',
						disque: '512',
					},
					notes: '',
				},
				id: 'item-5435766',
				title: '2445 - Dell Vostro 5502',
			},
			{
				_id: '627bec9b255ef2b6b5c2a671',
				serialNumber: '2446',
				etatDisponible: true,
				details: {
					marque: 'Dell',
					modele: 'Vostro 5502',
					dateAcquisition: '2019-06-03',
					configuration: {
						systeme: 'Windows 10 64x',
						processeur: 'intel core i7-1165G7 @ 2.80Ghz',
						memoire: '16',
						disque: '512',
					},
					notes: '',
				},
				id: 'item-15064856',
				title: '2446 - Dell Vostro 5502',
			},
			{
				_id: '627bec9b255ef2b6b5c2a672',
				serialNumber: '2447',
				etatDisponible: true,
				details: {
					marque: 'Dell',
					modele: 'Vostro 5502',
					dateAcquisition: '2019-06-03',
					configuration: {
						systeme: 'Windows 10 64x',
						processeur: 'intel core i7-1165G7 @ 2.80Ghz',
						memoire: '16',
						disque: '512',
					},
					notes: '',
				},
				id: 'item-25506120',
				title: '2447 - Dell Vostro 5502',
			},
			{
				_id: '627bec9b255ef2b6b5c2a673',
				serialNumber: '2448',
				etatDisponible: true,
				details: {
					marque: 'Dell',
					modele: 'Vostro 5502',
					dateAcquisition: '2019-06-03',
					configuration: {
						systeme: 'Windows 10 64x',
						processeur: 'intel core i7-1165G7 @ 2.80Ghz',
						memoire: '16',
						disque: '512',
					},
					notes: '',
				},
				id: 'item-48509084',
				title: '2448 - Dell Vostro 5502',
			},
			{
				_id: '627bec9b255ef2b6b5c2a674',
				serialNumber: '2449',
				etatDisponible: true,
				details: {
					marque: 'Dell',
					modele: 'Vostro 5502',
					dateAcquisition: '2019-06-03',
					configuration: {
						systeme: 'Windows 10 64x',
						processeur: 'intel core i7-1165G7 @ 2.80Ghz',
						memoire: '16',
						disque: '512',
					},
					notes: '',
				},
				id: 'item-40703476',
				title: '2449 - Dell Vostro 5502',
			},
			{
				_id: '627bec9b255ef2b6b5c2a675',
				serialNumber: '2450',
				etatDisponible: true,
				details: {
					marque: 'Dell',
					modele: 'Vostro 5502',
					dateAcquisition: '2019-06-03',
					configuration: {
						systeme: 'Windows 10 64x',
						processeur: 'intel core i7-1165G7 @ 2.80Ghz',
						memoire: '16',
						disque: '512',
					},
					notes: '',
				},
				id: 'item-40670629',
				title: '2450 - Dell Vostro 5502',
			},
		],
	]);
	const [usagers, setUsagers] = useState([
		{
			_id: '6272d17503cd98ea79ad8246',
			prenom: 'Guillaume',
			nom: 'Huard',
			appareilsAffectes: [],
			label: 'Guillaume Huard',
		},
	]);
	const [usagerChoisi, setUsagerChoisi] = useState([]);
	const [refreshState, setRefreshState] = useState(false);

	//  const getUsers = () => {
	//   console.log('getUsers');
	//   const f = async () => {
	//    try {
	//     const getUsersRequest = await Axios({
	//      method: 'get',
	//      url: 'http://localhost:3001/usagers',
	//     });
	//     getUsersRequest.data.map((usager) => {
	//      usager.label = usager.prenom + ' ' + usager.nom;
	//     });
	//     getUsersRequest.data.map((usager) => {
	//      usager.appareilsAffectes.map((appareil) => {
	//       appareil.id = `item-${Math.floor(Math.random() * 90000001)}`;
	//      });
	//     });
	//     setUsagers(getUsersRequest.data);
	//    } catch (e) {
	//     console.log('Failed to connect ' + e);
	//    }
	//   };
	//   f();
	//  };

	//  const getOrdinateurs = () => {
	//   const g = async () => {
	//    try {
	//     const getOrdinateursRequest = await Axios({
	//      method: 'get',
	//      url: 'http://localhost:3001/ordinateurs',
	//     });
	//     getOrdinateursRequest.data.map((ordinateur) => {
	//      ordinateur.id = `item-${Math.floor(Math.random() * 90000001)}`;
	//     });
	//     setOrdinateurs(getOrdinateursRequest.data);
	//    } catch (e) {
	//     console.log('Failed to connect ' + e);
	//    }
	//   };
	//   g();
	//  };

	const triggerRefresh = () => {
		refreshState === false ? setRefreshState(true) : setRefreshState(false);
	};

	React.useEffect(() => {
		getUsers();
		getOrdinateurs();
		setRefreshState(false);
	}, [refreshState]);

	// const listerNomsUsagers = () => {
	//   let listeNoms = [];
	//   usagers.map((usager) => {
	//     listeNoms.push(usager.nom + " " + usager.prenom);
	//   });
	//   return listeNoms;
	// };

	return (
		<React.Fragment>
			<Box sx={{ marginTop: '10px' }}>
				<Grid container spacing={2} display="flex" alignItems="center">
					<Grid item xs={12}>
						<Autocomplete
							blurOnSelect
							disableClearable
							onChange={(event, value) => {
								setUsagerChoisi(value);
								triggerRefresh();
							}}
							id="choixUsager"
							options={usagers}
							getOptionLabel={(option) => option.label}
							isOptionEqualToValue={(option, value) =>
								option._id === value._id
							}
							renderInput={(params) => (
								<TextField {...params} label="Choisissez un usager" />
							)}
						/>
					</Grid>
				</Grid>
				{refreshState === false ? (
					<DragAndDrop
						usagerChoisi={usagerChoisi}
						ordinateurs={ordinateurs}
						refreshState={refreshState}
					/>
				) : (
					<br />
				)}
			</Box>
		</React.Fragment>
	);
};

export default Affectation;
